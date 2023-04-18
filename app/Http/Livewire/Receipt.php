<?php

namespace App\Http\Livewire;

use App\Models\Sales;
use Livewire\Component;

class Receipt extends Component
{
    public $order_id;
    public $items;
    protected $listeners = ['print'];

    public function render()
    {
        return view('livewire.receipt');
    }

    public function print($id)
    {
        $this->order_id = $id;
        $this->items = Sales::where('order_id',$id)->where('status',1)->get();
    }
}
