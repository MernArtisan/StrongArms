<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\service;
use App\Models\Availability;
use Illuminate\Http\Request;
use App\Models\provider_detail;
use Illuminate\Support\Facades\Auth;

class AvailabilityController extends Controller
{
    public function index()
    {

        try {
            if (Auth::user()->hasRole('provider')) {

                $provider = provider_detail::where('user_id', Auth::user()->id)->first();
                // dd($provider);
                $availability = Availability::where('provider_id', $provider->id)->get();
                // dd($availability);
                return view('admin.availability.index', compact('availability'));
            } else {
                // $provider = provider_detail::where('user_id', $user->id)->first();
                // $availability = Availability::where('provider_id', $provider)->get();
                // return view('admin.availability.index', compact('availability'));
                $availability = Availability::all();
                return view('admin.availability.index', compact('availability'));
            }
        } catch (Exception $e) {
            return redirect()->back()->with('error', 'Failed to load availabilities: ' . $e->getMessage());
        }
    }


    public function create()
    {
        try {
            $provider = provider_detail::where('user_id', Auth::user()->id)->first();
            $user = Auth::user();

            if ($user->hasRole('provider')) {
                $services = Service::where('provider_id', $provider->id)->get();
                return view('admin.availability.create', compact('services'));
            } else {
                return view('admin.error.errors-403');
            }
        } catch (\Exception $e) {
            // You can log the error if needed: Log::error($e);
            return redirect()->back()->with('error', 'An unexpected error occurred: ' . $e->getMessage());
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'service_id' => 'required|exists:services,id',
                'date' => ['required', 'date', function ($attribute, $value, $fail) {
                    if (strtotime($value) < strtotime(date('Y-m-d'))) {
                        $fail('The ' . $attribute . ' must be today or later.');
                    }
                }],
                'time_slot' => [
                    'required',
                    'string',
                    'regex:/^\d{2}:\d{2}\s*-\s*\d{2}:\d{2}$/'
                ],
                'status' => 'required|in:available,unavailable',
            ], [
                'time_slot.regex' => 'Time slot must be in the format HH:MM - HH:MM (e.g. 11:00 - 13:00).',
            ]);

            $provider = provider_detail::where('user_id', Auth::user()->id)->first();

            // dd($request);
            Availability::create([
                'provider_id' => $provider->id,
                'service_id' => $request->service_id,
                'date' => $request->date,
                'time_slot' => $request->time_slot,
                'status' => $request->status,
            ]);

            return redirect()->route('avail.index')->with('success', 'Availability created successfully.');
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred: ' . $e->getMessage())->withInput();
        }
    }


    public function edit() {}

    public function update() {}

    public function delete($id)
    {
        $availability = Availability::findOrFail($id);
        $availability->delete();

        return redirect()->route('avail.index')->with('success', 'Availability deleted successfully.');
    }
}
