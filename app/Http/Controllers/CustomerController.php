<?php

namespace App\Http\Controllers;

use App\Models\BalanceHistory;
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

        $customer_id = $query->id;
        $balance_history = BalanceHistory::create([
            'customer_id' => $customer_id,
            'old_balance' => 0,
            'added_balance' => $data['balance'],
            'new_balance' => $data['balance']   
        ]);
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

    public function print_balance($id)
    {
        $balance = BalanceHistory::where('customer_id',$id)->latest()->first();
        $customer = Customer::where('id',$id)->first();
        return view('customers.print_balance',['balance'=>$balance,'customer'=>$customer]);
    }
}
