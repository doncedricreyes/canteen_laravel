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
    public $item_id;
    public $modal;
    public $edit_items;
   
    public function mount()
    {
        $this->items = Items::where('status','available')->where('remove',1)->get();
        $this->category = Category::where('status',1)->get();
    }

    public function render()
    {
        
        return view('livewire.item');

    }

    public function search()
    {
        $this->items = Items::where('status','available')->where('remove',1)->where('name','like',"%$this->search%")->get();
    }

    public function sort()
    {
        if($this->category_sort == 'all')
        {
            $this->items = Items::where('status','available')->where('remove',1)->get(); 
        }
        else{
        $this->items = Items::where('status','available')->where('remove',1)->where('category_id',$this->category_sort)->get();
        }
    }


    public function edit_item($id)
    {
        $this->edit_items = Items::with('Category')->where('id',$id)->get();
        $this->emit('show-modal');
    }
    


}
