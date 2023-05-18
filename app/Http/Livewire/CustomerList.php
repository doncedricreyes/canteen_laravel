<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class CustomerList extends Component
{
    public $customers;
    public $search;

    public function mount()
    {
        $this->customers = Customer::select('section','level')->distinct()->where('status','available')->get();
    }

    public function render()
    {
        return view('livewire.customer-list');
    }

    public function search()
    {
        $this->customers = Customer::select('section','level')->distinct()->where('status','available')
        ->where('section','LIKE','%'.$this->search.'%')->orWhere('level','LIKE','%'.$this->search.'%')->get();
    }
}
