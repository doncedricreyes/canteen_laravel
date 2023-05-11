<?php

namespace App\Http\Livewire;

use App\Models\BalanceHistory;
use Livewire\Component;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;
class AddBalance extends Component
{
    public $rfid;
    public $balance;
    public $add_balance;

    public function render()
    {
        return view('livewire.add-balance');
    }

    public function balance()
    {
        $this->balance = Customer::where('rfid',$this->rfid)->where('status','available')->get();
    }

    public function add_balance()
    {
        $customer = Customer::where('rfid',$this->rfid)->first();
        $customer_id = $customer->id;
        $old_balance = $customer->balance;
        $added_balance = $this->add_balance;
        $new_balance = $old_balance + $added_balance;
        
        Customer::where('rfid',$this->rfid)->increment('balance',$this->add_balance);
        $this->balance = Customer::where('rfid',$this->rfid)->where('status','available')->get();
        $this->add_balance = 0;

        Alert::success('Success!', 'Category Successfully Created');

        $balance_history = BalanceHistory::create([
            'customer_id' => $customer_id,
            'old_balance' => $old_balance,
            'added_balance' => $added_balance,
            'new_balance' => $new_balance
        ]);
       


    }
}
