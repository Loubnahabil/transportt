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

    // booking add
    public function bookingAdd()
    {
        return view('formbooking.bookingadd');
    }
    
    // booking edit
    public function bookingEdit()
    {
        return view('formbooking.bookingedit');
    }

}
