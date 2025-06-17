<?php

namespace App\Http\Controllers\frontend;

use App\Models\General;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\contact_query as Contact;

class ContactController extends Controller
{
    public function index()
    {

        return view('Frontend.contact.contact');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'full_name' => 'required',
            'email' => 'required|email',
            'subject' => 'required',
            'message' => 'required',
        ]);
        try {

            Contact::create($validatedData);

            return back()->with('success', 'Your message has been sent successfully');
        } catch (\Throwable $th) {

            return back()->with('error', $th->getMessage());
        }
    }
}
