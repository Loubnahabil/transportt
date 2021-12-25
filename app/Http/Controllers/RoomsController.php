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
        $allRooms = DB::table('rooms')->get();
        return view('room.allroom',compact('allRooms'));
    }
    // add room page
    public function addRoom()
    {
        $data = DB::table('room_types')->get();
        $user = DB::table('users')->get();
        return view('room.addroom',compact('user','data'));
    }
    // edit room
    public function editRoom()
    {
        return view('room.editroom');
    }

    // save record room
    public function saveRecordRoom(Request $request)
    {
        $request->validate([
            'name'          => 'required|string|max:255',
            'room_type'     => 'required|string|max:255',
            'ac_non_ac'     => 'required|string|max:255',
            'food'          => 'required|string|max:255',
            'bed_count'     => 'required|string|max:255',
            'charges_for_cancellation' => 'required|string|max:255',
            'rent'          => 'required|string|max:255',
            'phone_number'  => 'required|string|max:255',
            'fileupload'    => 'required|file',
            'message'       => 'required|string|max:255',
        ]);

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

    // delete record
    public function deleteRecord(Request $request)
    {
        try {

            Room::destroy($request->id);
            unlink('assets/upload/'.$request->fileupload);
            Toastr::success('Room deleted successfully :)','Success');
            return redirect()->back();
        
        } catch(\Exception $e) {

            DB::rollback();
            Toastr::error('Room delete fail :)','Error');
            return redirect()->back();
        }
    }
}
