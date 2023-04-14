<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;


class ItemController extends Controller
{
    public function category_index()
    {
        return view ('category.index');
    }

    public function category_store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required'
        ]);

        $data['status'] = 1;
        $query = Category::create($data);

        if($query)
        {
            return redirect('/category')->with('success','Category Successfully Created');
        }   
        else
        {
            return redirect('/category')->withErrors($data);
        }
    }


    public function item_index()
    {
        $category = Category::where('status',1)->get();
        $items = Item::where('status','available')->where('remove',null)->get();
        return view('items.index',['category'=>$category,'items'=>$items]);
    }

    public function item_store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|unique:items',
            'category_id' => 'required',
            'qty' => 'required',
            'buy_price' => 'required',
            'sell_price' => 'required',
            'pic' => 'image|nullable'
        ]);

        $data['description'] = $request->description;
        $data['status'] = 'available';

        $image = $request->file('pic');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$filename);
        $data['pic'] = $filename;
        //dd($data);
        $query = Item::create($data);

        return redirect('/items');
    }

}
