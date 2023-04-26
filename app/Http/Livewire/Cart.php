<?php

namespace App\Http\Livewire;

use App\Models\Sales;
use Livewire\Component;


class Cart extends Component
{
    public $order_id;
    public $items;
    public $total_amount;
    protected $listeners = ['cart_order']; 

   
    public function mount()
    {
        $this->order_id = Sales::where('status',0)->latest()->first();
        if($this->order_id != null){
        $this->total_amount = $this->order_id->total_amount;
        if($this->order_id)
        {
        $this->items = Sales::with('Item')->where('order_id',$this->order_id->order_id)->get();
        }
    }
    }
        public function cart_order($id)
    {
        $this->order_id = $id;
        $query = Sales::where('order_id',$this->order_id)->latest()->first();
        if($query != null){
        $this->total_amount = $query->total_amount;}
        else{
            $this->total_amount = 0;
        }
        if($this->order_id)
        {
        $this->items = Sales::with('Item')->where('order_id',$this->order_id)->get();
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }

    public function cart_remove($id)
    {
        $query = Sales::where('order_id',$this->order_id)->latest()->first();
        if($query != null){
            $this->total_amount = $query->total_amount;
        }


        $this->emit('remove',$id);
    }


}
