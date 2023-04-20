<?php

namespace App\Http\Livewire;

use App\Models\Customer;
use Livewire\Component;

class LimitBalance extends Component
{
    public $rfid;
    public $balance;
    public $limit;

    public function render()
    {
        return view('livewire.limit-balance');
    }

    public function balance()
    {
        $this->balance = Customer::where('rfid',$this->rfid)->where('status','available')->get();
    }

}
