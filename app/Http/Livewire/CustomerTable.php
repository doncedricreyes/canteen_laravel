<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerTable extends Component
{

    public $customers;
    public $search;
    public $lastname,$firstname,$middlename,$email,$level,$section,$rfid,$balance,$status;


    public function mount()
    {
        $this->customers = Customer::where('status','available')->get();
    }


    public function render()
    {
        return view('livewire.customer-table');
    }

    public function search()
    {
        $this->customers = Customer::where('status','available')->where('lastname','LIKE','%'.$this->search.'%')
        ->orWhere('firstname','LIKE','%'.$this->search.'%')
        ->orWhere('middlename','LIKE','%'.$this->search.'%')
        ->orWhere('level','LIKE','%'.$this->search.'%')
        ->orWhere('section','LIKE','%'.$this->search.'%')->get();
    }

   
}
