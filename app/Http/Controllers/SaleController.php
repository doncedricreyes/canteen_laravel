<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sales;
class SaleController extends Controller
{
    public function index()
    {
        return view('sales.index');
    }

    public function receipt($id)
    {
        $order_id = $id;
        $items = Sales::where('order_id',$id)->where('status',1)->get();
        //$total_amount = Sales::where('order_id',$id)->where('status',1)->first();
        return view('sales.receipt',['items'=>$items,'order_id'=>$order_id]);
    }
}
