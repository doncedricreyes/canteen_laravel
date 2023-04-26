<?php

namespace App\Http\Livewire;


use Livewire\Component;
use App\Models\Category;
use App\Models\Item;
use App\Models\Sales;
use App\Models\Customer;
use Livewire\WithPagination;

use Carbon\Carbon;
class Sale extends Component
{
    use WithPagination;
    
    public $category;
    public $items;
    public $category_sort;
    public $order_id;
    public $rfid;

    protected $listeners = ['remove'];

    public function mount()
    {
        $this->category = Category::where('status',1)->get();
        $this->items = Item::where('status','available')->where('remove',1)->get();
        $check_sales = Sales::where('status',0)->latest()->first();
        if($check_sales == null)
        {
          $this->order_id = $currentTime = Carbon::now()->format('dHiyms');
        }
        else{
          $this->order_id = $check_sales->order_id;
        }
        
       
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
        $this->items = Item::where('status','available')->where('remove',1)->where('category_id',$id)->get();
      }
       
        
    }

    public function add($id)
    {
        
        $query = Item::where('id',$id)->get();

        foreach($query as $i)
        {
            $name = $i->name;
            $price = $i->sell_price;
            $category = $i->category_id;
            $qty_left = $i->qty;
        }
        
        $data['order_id'] = $this->order_id;
        $data['item_id'] = $id;
        $data['item_name'] = $name;
        $data['price'] = $price;
        $data['status'] = 0;
        $data['qty'] = 1;


 
      if($qty_left >0)
        {
        $item_check = Sales::where('order_id',$this->order_id)->where('item_id',$id)->get();
  
        if($item_check->isNotEmpty())
        {
        Sales::where('order_id',$this->order_id)->where('item_id',$id)->increment('qty',1);
        Sales::where('order_id',$this->order_id)->where('item_id',$id)->increment('price',$price);


        Sales::where('order_id',$this->order_id)->increment('total_amount',$price);

        }
        else{
          $sales_check = Sales::where('order_id',$this->order_id)->get();
          if($sales_check->isEmpty())
          {
            $data['total_amount'] = $price;
          }
          else
          {
            Sales::where('order_id',$this->order_id)->increment('total_amount',$price);
            $amount =  Sales::where('order_id',$this->order_id)->first();
            $data['total_amount'] = $amount->total_amount;
          }
        Sales::create($data);
        }

        Item::where('id',$id)->decrement('qty',1);

        $this->items = Item::where('status','available')->where('remove',1)->get();
        $this->emit('cart_order',$this->order_id);
    
      }
   }

 
    public function remove($id)
    {
        $data = Sales::where('order_id',$this->order_id)->where('item_id',$id)->first();
        $item = Item::where('id',$id)->first();
        
        if($data->qty > 1)
        {
          $sales_count = Sales::where('order_id',$this->order_id)->where('item_id',$id)->first();
          $sales_count->decrement('qty',1);
          $sales_count->decrement('price',$item->sell_price);
          Sales::where('order_id',$this->order_id)->decrement('total_amount',$item->sell_price);
        }
        else{
          Sales::where('order_id',$this->order_id)->decrement('total_amount',$item->sell_price);
          $data->delete();
        }
        Item::where('id',$id)->increment('qty',1);
        $this->items = Item::where('status','available')->where('remove',1)->get();
        $this->emit('cart_order',$this->order_id);
    }
 

    public function card_payment()
    {
      $total_amount = Sales::where('order_id',$this->order_id)->latest()->first();
       $customer = Customer::where('rfid',$this->rfid)->first();

       if($total_amount->total_amount <= $customer->balance && $customer->balance != 0)
       {
          $customer->decrement('balance',$total_amount->total_amount);

          $update_sales = Sales::where('order_id',$this->order_id)->update(['customer_id'=>$customer->id,'mop'=>'card','status'=>1,'amount_paid'=>$total_amount->total_amount,'change'=>0]);

          return redirect()->route('print', ['id' => $this->order_id]);
        
       }
    }
}
