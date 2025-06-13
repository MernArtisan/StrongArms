<?php

namespace App\Http\Controllers\admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\provider_detail;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        try {
            if (Auth::user()->hasRole('admin')) {
                $bookings = Booking::with(['user', 'provider', 'service', 'availability'])
                    ->orderBy('date', 'desc')
                    ->paginate(10);
            } elseif (Auth::user()->hasRole('provider')) {
                $provider = provider_detail::where('user_id', Auth::id())->first();
                $providerId = $provider ? $provider->id : null;

                $bookings = Booking::with(['user', 'provider', 'service', 'availability'])
                    ->where('provider_id', $providerId)
                    ->orderBy('date', 'desc')
                    ->paginate(15);
            } else {
                return back();
            }

            return view('admin.booking.index', compact('bookings'));
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to Fetch Details: ' . $e->getMessage());
        }
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $booking = Booking::with(['user', 'provider', 'service', 'availability'])->findOrFail($id);

        return view('admin.booking.show', compact('booking'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function ajaxUpdateStatus(Request $request, Booking $booking)
    {
        $request->validate([
            'status' => 'required|in:confirmed,completed',
        ]);

        $booking->status = $request->status;
        $booking->save();

        return response()->json([
            'success' => true,
            'new_status' => $booking->status,
        ]);
    }
    
}
