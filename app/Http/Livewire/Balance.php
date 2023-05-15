<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use RealRashid\SweetAlert\Facades\Alert;

class Balance extends Component
{

    public $rfid;
    public $balance;

    public function render()
    {
        
        return view('livewire.balance');
    }

    public function balance()
    {
        //$this->rfid = 11;
        $this->balance = Customer::where('rfid',$this->rfid)->where('status','available')->get();
        session()->flash('success', 'This is a success message.');
    }
}
