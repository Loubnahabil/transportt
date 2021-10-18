<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Brian2694\Toastr\Facades\Toastr;
use App\Models\Booking;
use DB;

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

    // booking save record
    public function saveRecord(Request $request)
    {
        $request->validate([
            'name'   => 'required|string|max:255',
            'room_type'     => 'required|string|max:255',
            'total_numbers' => 'required|string|max:255',
            'date' => 'required|string|max:255',
            'time' => 'required|string|max:255',
            'arrival_date'  => 'required|string|max:255',
            'depature_date' => 'required|string|max:255',
            'email'      => 'required|string|max:255',
            'phone_number'  => 'required|string|max:255',
            'fileupload' => 'required|file',
            'message'    => 'required|string|max:255',
        ]);

        DB::beginTransaction();
        try {

            $folder_name= 'upload';
            \Storage::disk('local')->makeDirectory($folder_name, 0775, true); //creates directory
            $destinationPath = $folder_name.'/';
            $photo= $request->fileupload;
            $file_name = $photo->getClientOriginalName(); //Get file original name                   
            \Storage::disk('local')->put($folder_name.'/'.$file_name,file_get_contents($photo->getRealPath()));
           
            $booking = new Booking;
            $booking->name = $request->name;
            $booking->room_type     = $request->room_type;
            $booking->total_numbers  = $request->total_numbers;
            $booking->date  = $request->date;
            $booking->time  = $request->time;
            $booking->arrival_date   = $request->arrival_date;
            $booking->depature_date  = $request->depature_date;
            $booking->email       = $request->email;
            $booking->ph_number       = $request->phone_number;
            $booking->fileupload  = $file_name;
            $booking->message     = $request->message;
            $booking->save();
            
            DB::commit();
            Toastr::success('Create new booking successfully :)','Success');
            return redirect()->back();
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Booking fail :)','Error');
            return redirect()->back();
        }
    }

}
