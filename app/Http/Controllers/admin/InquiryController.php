<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\contact_query;

class InquiryController extends Controller
{
    public function query()
    {
        $query = contact_query::all();
        return view('admin.inquiry.index',compact('query'));
    }
}
