<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Brian2694\Toastr\Facades\Toastr;
use DB;

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
    // edit room
    public function editRoom()
    {
        return view('room.editroom');
    }

    // save record room
    public function saveRecordRoom(Request $request)
    {
        // $request->validate([
        //     ''   => 'required|string|max:255',
        //     ''     => 'required|string|max:255',
        // ]);

        DB::beginTransaction();
        try {

            $photo= $request->fileupload;
            $file_name = rand() . '.' .$photo->getClientOriginalName();
            $photo->move(public_path('/assets/upload/'), $file_name);
           
            $room = new Room;
            $room->name         = $request->name;
            $room->room_type    = $request->room_type;
            $room->ac_non_ac    = $request->ac_non_ac;
            $room->food         = $request->food;
            $room->bed_count    = $request->bed_count;
            $room->charges_for_cancellation   = $request->charges_for_cancellation;
            $room->rent         = $request->rent;
            $room->phone_number = $request->phone_number;
            $room->fileupload   = $file_name;
            $room->message      = $request->message;
            dd($room);
            $room->save();
            
            DB::commit();
            Toastr::success('Create new room successfully :)','Success');
            return redirect()->route('form/allrooms/page');
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Room fail :)','Error');
            return redirect()->back();
        }
    }
}
