<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::where('status','available')->get();
        return view('customers.index',['customers'=>$customers]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'lastname' => 'required',
            'firstname' => 'required',
            'email' => 'email',
            'level' => 'required',
            'section' => 'required',
            'rfid' => 'required|unique:customers',
            'balance' => 'required'
        ]);
        $data['middlename'] = $request->middlename;
        $data['status'] = 'available';

        $query = Customer::create($data);
    }
}
