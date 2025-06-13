<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\General;

class ContactUsController extends Controller
{
    public function index()
    {
        $contacts = General::paginate(10);
        // dd($contacts->all());
        return view('admin.contactus.index', compact('contacts'));
    }

    public function show($id)
    {
        $contact = General::findOrFail($id);
        return view('admin.contactus.show', compact('contact'));
    }

    public function edit($id)
    {
        $contact = General::findOrFail($id);
        return view('admin.contactus.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        try {
            $validated = $request->validate([
                'email' => 'nullable|email',
                'phone' => 'nullable|string',
                'address' => 'nullable|string',
                'location' => 'nullable|string',
                'lat' => 'nullable|string',
                'long' => 'nullable|string',
                'facebook' => 'nullable|url',
                'instagram' => 'nullable|url',
                'linkedin' => 'nullable|url',
                'twitter' => 'nullable|url',
            ]);

            $contact = General::findOrFail($id);
            $contact->update($validated);

            return redirect()->route('contact-queries.index')->with('success', 'Contact information updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Something Went Wrong' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $contact = General::findOrFail($id);
        $contact->delete();

        return redirect()->route('contact-queries.index')->with('success', 'Contact message deleted successfully.');
    }
}
