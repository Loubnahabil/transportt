<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    // view page all booking
    public function allbooking()
    {
        return view('formbooking.allbooking');
    }
}
