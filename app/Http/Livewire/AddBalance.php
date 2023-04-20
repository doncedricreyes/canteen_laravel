<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

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
        Customer::where('rfid',$this->rfid)->increment('balance',$this->add_balance);
        $this->balance = Customer::where('rfid',$this->rfid)->where('status','available')->get();
        $this->add_balance = 0;
    }
}
