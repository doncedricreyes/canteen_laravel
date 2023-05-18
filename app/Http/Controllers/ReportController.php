<?php

namespace App\Http\Controllers;

use App\Models\Sales;
use Illuminate\Http\Request;
use App\Models\Customer;

class ReportController extends Controller
{
    
    public function sales_report()
    {
        $sales = Sales::all();

        $report = [];
    
        foreach ($sales as $sale) {
            $report[] = [
                'date' => $sale->created_at->format('Y-m-d'),
                'amount' => $sale->amount_paid,
                'customer' => $sale->customer_id,
            ];
        }

        return view('report.sales',['report' => $report]);
    }

    public function customers_report()
    {
        return view('report.customers');
    }

    public function customers_section($level, $section)
    {
        $customers = Customer::where('level',$level)->where('section',$section)->first();
        return view('report.section',['customers'=>$customers]);
    }
}
