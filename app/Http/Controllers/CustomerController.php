<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Brian2694\Toastr\Facades\Toastr;
use DB;

class CustomerController extends Controller
{
    // view page all customer
    public function allCustomers()
    {
        return view('formcustomers.allcustomers');
    }

    // add Customer
    public function addCustomer()
    {
        $data = DB::table('room_types')->get();
        $user = DB::table('users')->get();
        return view('formcustomers.addcustomer',compact('data','user'));
    }
    // save record
    public function saveCustomer(Request $request)
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

            $photo= $request->fileupload;
            $file_name = rand() . '.' .$photo->getClientOriginalName();
            $photo->move(public_path('/assets/upload/'), $file_name);
           
            $customer = new Customer;
            $customer->name = $request->name;
            $customer->room_type     = $request->room_type;
            $customer->total_numbers  = $request->total_numbers;
            $customer->date  = $request->date;
            $customer->time  = $request->time;
            $customer->arrival_date   = $request->arrival_date;
            $customer->depature_date  = $request->depature_date;
            $customer->email       = $request->email;
            $customer->ph_number   = $request->phone_number;
            $customer->fileupload  = $file_name;
            $customer->message     = $request->message;
            $customer->save();
            
            DB::commit();
            Toastr::success('Create new customer successfully :)','Success');
            return redirect()->route('form/allcustomers/page');
            
        } catch(\Exception $e) {
            DB::rollback();
            Toastr::error('Add Customer fail :)','Error');
            return redirect()->back();
        }
    }

    // edit customer
    public function editCustomer()
    {
        return view('formcustomers.editcustomer');
    }
}
