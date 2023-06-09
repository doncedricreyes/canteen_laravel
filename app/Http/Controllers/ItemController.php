<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Item;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    public function category_index()
    {
        $category = Category::paginate(10);
        $title = 'Remove Category!';
        $text = "Are you sure you want to delete?";
        confirmDelete($title, $text);
        return view ('category.index',['category'=>$category]);
    }

    public function category_store(Request $request)
    {
        $data = $request->validate([
            'category' => 'required|unique:categories,category'
        ]);

        $data['status'] = 1;
        $query = Category::create($data);

        if($query)
        {
            Alert::success('Success!', 'Category Successfully Created');

            return redirect('/category');
        }   
        else
        {
            Alert::error('Error Title', 'Error Message');
            return redirect('/categoryasdasd');
        }
    }

    public function category_update(Category $id, Request $request)
    {
        $data = $request->validate([
            'category' => ['required',Rule::unique('categories')->ignore($id->id)],
        ]);
        $id->category = $request->category;
        if($id->save())
        {
            alert::success('Success!', 'Category Successfully Updated');
            return redirect()->route('category_index');
        }
        else{
            Alert::success('Success!', 'Category Successfully Created');
            return redirect()->route('category_index');
        }
    }

    public function category_remove(Category $id)
    {
        $id->status = 0;
        $id->save();
        Alert::success('Success!', 'Category Successfully Removed');
        return redirect()->route('category_index');
    }

    public function category_restore(Category $id)
    {
        $id->status = 1;
        $id->save();
        Alert::success('Success!', 'Category Successfully Restored');
        return redirect()->route('category_index');
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
        else
        {
            $data['pic'] = 'default.png';
        }
        //dd($data);
        $query = Item::create($data);
        Alert::success('Success!', 'Item Successfully Created');
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
