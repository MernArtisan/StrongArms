<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Http\Controllers\Controller;

class ServiceViewController extends Controller
{
    public function index()
    {
        $services = Service::paginate(9);
        return view('frontend.services.services', compact('services'));
    }
    
}
