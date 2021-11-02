<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
        return view('formcustomers.addcustomer');
    }
}
