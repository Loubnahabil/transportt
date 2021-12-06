<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RoomsController extends Controller
{
    // index page
    public function allrooms()
    {
        return view('room.allroom');
    }
    // add room page
    public function addRoom()
    {
        return view('room.addroom');
    }
}
