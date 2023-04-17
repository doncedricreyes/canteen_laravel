<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Category;
use App\Models\Item;
use App\Models\Sales;
use Livewire\WithPagination;

use Carbon\Carbon;
class Sale extends Component
{
    use WithPagination;
    
    public $category;
    public $items;
    public $category_sort;
    public $order_id;


    public function mount()
    {
        $this->category = Category::where('status',1)->get();
        $this->items = Item::where('status','available')->where('remove',null)->get();
        $this->order_id = $currentTime = Carbon::now()->format('dHiyms');
    }

    
  
    
    public function render()
    {
     
        return view('livewire.sale');
    }

    public function sort($id)
    {
      if($id == 'all')
      {
        $this->items = Item::all();
      }
      else{
        $this->items = Item::where('status','available')->where('remove',null)->where('category_id',$id)->get();
      }
       
        
    }

    public function add($id)
    {
        
        $query = Item::where('id',$id)->get();

        foreach($query as $i)
        {
            $name = $i->name;
            $price = $i->sell_price;
        }
        
        $data['order_id'] = $this->order_id;
        $data['item_id'] = $id;
        $data['item_name'] = $name;
        $data['price'] = $price;
        $data['status'] = 0;
        $data['total_amount'] = $price;
        $data['qty'] = 1;

        Sales::create($data);

        Item::where('id',$id)->decrement('qty',1);

        $this->items = Item::where('status','available')->where('remove',null)->get();
    }

 
    public function remove($id)
    {
        $data = Sales::where('order_id',$this->order_id)->where('item_id',$id)->first();
        $data->delete();

        Item::where('id',$id)->increment('qty',1);
        $this->items = Item::where('status','available')->where('remove',null)->get();
    }
 

}
