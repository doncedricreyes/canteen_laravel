<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Customer;

class CustomerSection extends Component
{
    public $search;
    public $customers;
    public $level;
    public $section;


    public function mount()
    {
        $this->customers = Customer::where('level',$this->level)->where('section',$this->section)->where('status','available')->get();
    }

    public function render()
    {
        return view('livewire.customer-section');
    }

    public function search()
    {
        $this->customers = Customer::where('level',$this->level)->where('section',$this->section)->where('status','available')

        ->get();
    }
}
