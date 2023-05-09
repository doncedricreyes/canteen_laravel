<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
use App\Models\Canteen_Balance;
use Carbon\Carbon;
class SaleController extends Controller
{
    public function index()
    {
        $check_date = Carbon::today()->format('Y-m-d');
        $query = Canteen_Balance::where('date',$check_date)->first();

        if($query !== null)
        {
            return view('sales.index');
        }
        else{
            return redirect()->route('open_balance');
        }
       
    }

    public function receipt($id)
    {
        $order_id = $id;
        $items = Sales::where('order_id',$id)->where('status',1)->get();
        //$total_amount = Sales::where('order_id',$id)->where('status',1)->first();
        return view('sales.receipt',['items'=>$items,'order_id'=>$order_id]);
    }

    public function opening_balance()
    {
        
        $current_date = Carbon::today()->format('M d, Y');
        $check_date = Carbon::today()->format('Y-m-d');
        $query = Canteen_Balance::where('date',$check_date)->first();

        if($query !== null)
        {
            return redirect()->route('sales');
        }
        else{
        return view('sales.open_balance',['current_date'=>$current_date]);
        }
    }

    public function store_opening_balance(Request $request)
    {
        $current_date = Carbon::today()->format('Y-m-d');
        $data = $request->validate([
            'opening_balance' => 'required|numeric',
            
        ]);
        $data['date']=$current_date;
        $data['new_balance'] = $request->opening_balance;
        Canteen_Balance::create($data);

    }

    
}
