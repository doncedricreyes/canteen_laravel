<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use RealRashid\SweetAlert\Facades\Alert;


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
            Alert::success('Success Title', 'Success Message');

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
        $items = Item::where('status','available')->where('remove',1)->get();
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
        $data['remove'] = 1;
        $image = $request->file('pic');
        if($image){
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$filename);
        $data['pic'] = $filename;
        }
        //dd($data);
        $query = Item::create($data);

        return redirect('/items');
    }

    public function item_update(Item $id, Request $request)
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
        if($image){
        $filename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('images'),$filename);
        $data['pic'] = $filename;
        }
       $id->update($data);
       return back();
   
    }

    public function item_remove($id)
    {
        $item = Item::find($id);
        
        $item->remove = '0';
        $item->save();
        return back();
    }

}
