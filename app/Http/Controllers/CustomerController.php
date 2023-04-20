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
        $data['limit'] = 0;
        $query = Customer::create($data);
    }

    public function check_balance()
    {
        return view('customers.check_balance');
    }

    public function add_balance()
    {
        return view('customers.add_balance');
    }

    public function limit()
    {
        return view('customers.limit');
    }
}
