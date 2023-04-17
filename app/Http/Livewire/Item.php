<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Item as Items;
use App\Models\Category;

class Item extends Component
{
    public $items;
    public $search;
    public $category;
    public $category_sort;
   
    public function mount()
    {
        $this->items = Items::where('status','available')->where('remove',null)->get();
        $this->category = Category::where('status',1)->get();
    }

    public function render()
    {
        
        return view('livewire.item');

    }

    public function search()
    {
        $this->items = Items::where('status','available')->where('remove',null)->where('name','like',"%$this->search%")->get();
    }

    public function sort()
    {
        if($this->category_sort == 'all')
        {
            $this->items = Items::where('status','available')->where('remove',null)->get(); 
        }
        else{
        $this->items = Items::where('status','available')->where('remove',null)->where('category_id',$this->category_sort)->get();
        }
    }

    

}
