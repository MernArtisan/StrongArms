<?php

namespace App\Http\Controllers\frontend;

use App\Models\Booking;
use App\Models\Service;
use App\Models\Availability;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceViewController extends Controller
{
    public function index()
    {
        $services = Service::paginate(15);
        return view('frontend.services.services', compact('services'));
    }
    public function booking($id)
    {
        $service = Service::findOrFail($id);

        $availability = Availability::where('service_id', $id)
            ->where('status', 'available')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'id' => $item->id,
                    'date' => $item->date,
                    'time_slot' => $item->time_slot
                ];
            });

        $availableDates = $availability->pluck('date')->unique()->sort()->values();

        return view('Frontend.services.booking', compact('service', 'availability', 'availableDates'));
    }


    public function appointment(Request $request)
    {
        // Validate request
        $request->validate([
            'service_id' => 'required|exists:services,id',
            'time_slot' => 'required|string'
        ]);

        // Find service
        $service = Service::findOrFail($request->service_id);

        // Find matching availability (just to get date + availability_id)
        $availability = Availability::where('service_id', $request->service_id)
            ->where('time_slot', $request->time_slot)
            ->where('status', 'available')
            ->first();

        if (!$availability) {
            return back()->withErrors(['time_slot' => 'Selected time slot is not available.']);
        }

        // Create booking (without marking availability as booked)
        $booking = Booking::create([
            'user_id' => Auth::id(),
            'provider_id' => $service->provider_id,
            'service_id' => $request->service_id,
            'availability_id' => $availability->id,
            'date' => $availability->date,
            'time_slot' => $request->time_slot,
            'note' => $request->note ?? null,
            'status' => 'confirmed', // default status
        ]);

        return redirect()->back()->with('success', 'Appointment booked successfully!');
    }
}
