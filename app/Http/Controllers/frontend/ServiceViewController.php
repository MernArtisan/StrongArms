<?php

namespace App\Http\Controllers\frontend;

use Stripe\Stripe;
use App\Models\Booking;
use App\Models\Payment;
use App\Models\service;
use App\Models\Availability;
use Illuminate\Http\Request;
use App\Mail\BookingConfirmedMail;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Stripe\Checkout\Session as StripeSession;

class ServiceViewController extends Controller
{
    public function index()
    {
        $services = service::paginate(15);
        return view('Frontend.services.services', compact('services'));
    }

    public function booking($id)
    {
        $service = service::findOrFail($id);

        $today = now()->toDateString();
        $currentTime = now()->format('H:i');

        $availability = Availability::where('service_id', $id)
            ->where('status', 'available')
            ->where(function ($query) use ($today, $currentTime) {
                $query->where('date', '>', $today)
                    ->orWhere(function ($query) use ($today, $currentTime) {
                        $query->where('date', $today)
                            ->where('time_slot', '>', $currentTime);
                    });
            })
            ->orderBy('date')
            ->orderBy('time_slot')
            ->get()
            ->map(function ($item) {
                [$start, $end] = array_map('trim', explode('-', $item->time_slot));

                $startTime = \Carbon\Carbon::createFromFormat('H:i', $start);
                $endTime = \Carbon\Carbon::createFromFormat('H:i', $end);

                $formattedTimeSlot = $startTime->format('g:i A') . ' - ' . $endTime->format('g:i A');

                return [
                    'id' => $item->id,
                    'date' => $item->date,
                    'time_slot' => $item->time_slot,
                    'formatted_time_slot' => $formattedTimeSlot
                ];
            });

        $availableDates = $availability->pluck('date')->unique()->sort()->values();

        return view('Frontend.services.booking', compact('service', 'availability', 'availableDates'));
    }

    // NEW: create Stripe session for appointment
    public function createStripeAppointmentSession(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to continue.');
        }

        $request->validate([
            'service_id' => 'required|exists:services,id',
            'time_slot' => 'required|string',
            'note' => 'nullable|string'
        ]);

        $service = service::findOrFail($request->service_id);

        $availability = Availability::where('service_id', $request->service_id)
            ->where('time_slot', $request->time_slot)
            ->where('status', 'available')
            ->first();

        if (!$availability) {
            return back()->withErrors(['time_slot' => 'Selected time slot is not available.']);
        }

        Stripe::setApiKey(config('services.stripe.secret'));

        $session = StripeSession::create([
            'payment_method_types' => ['card'],
            'customer_email' => 'abdulmoiz492@gmail.com',
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => $service->name,
                    ],
                    'unit_amount' => $service->price * 100,
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('appointment.stripe.success') . '?session_id={CHECKOUT_SESSION_ID}',
            'cancel_url' => route('appointment.stripe.cancel'),
            'metadata' => [
                'user_id' => Auth::id(),
                'service_id' => $service->id,
                'availability_id' => $availability->id,
                'time_slot' => $request->time_slot,
                'note' => $request->note ?? '',
            ]
        ]);

        return redirect($session->url);
    }

    // NEW: Stripe success — create booking
    public function stripeAppointmentSuccess(Request $request)
    {

        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Please login to continue.');
        }

        $sessionId = $request->get('session_id');

        Stripe::setApiKey(config('services.stripe.secret'));
        $session = StripeSession::retrieve($sessionId);

        $metadata = $session->metadata ?? null;
        if (!$metadata) {
            return redirect()->route('home')->with('error', 'Payment metadata missing.');
        }

        // Safety check
        $availability = Availability::find($metadata->availability_id);

        if (!$availability || $availability->status != 'available') {
            return redirect()->route('home')->with('error', 'Selected time slot is no longer available.');
        }

        // Create booking
        $booking = Booking::create([
            'user_id' => $metadata->user_id,
            'provider_id' => Service::find($metadata->service_id)->provider_id,
            'service_id' => $metadata->service_id,
            'availability_id' => $metadata->availability_id,
            'date' => $availability->date,
            'time_slot' => $metadata->time_slot,
            'note' => $metadata->note,
            'status' => 'confirmed',
        ]);

        // Create payment record (only availability_id and amount)
        Payment::create([
            'booking_id' => $booking->id,  // <--- this is correct
            'amount' => $session->amount_total / 100,
        ]);

        // Optional: mark availability as booked
        // $availability->update(['status' => 'booked']);
        Mail::to(Auth::user()->email)->send(new BookingConfirmedMail($booking));

        return view('Frontend.partials.thankyou2')->with('success', 'Appointment booked successfully via Stripe!');
    }


    // Optional fallback: user canceled payment
    public function stripeAppointmentCancel()
    {
        return redirect('/')->with('error', 'Payment canceled.');
    }
}
