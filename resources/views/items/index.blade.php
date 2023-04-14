@extends('layouts.navbar')

@section('content')
 
@livewire('item')








<dialog id="myModal" class="h-auto w-11/12 md:w-1/2 p-5  bg-white rounded-md ">
        
   <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex w-full h-auto justify-center items-center">
          <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                Create New Item
          </div>
          <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>

   
          <!--Header End-->
        </div>
          <!-- Modal Content-->
          <!-- component -->
          <form method="POST" action="/items/store" enctype="multipart/form-data">
              @csrf
          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="name">
                  Item Name
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="name" name="name" type="text" placeholder="Item Name">
              </div>
              <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="grid-last-name">
                  Category
                </label>
              <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="category_id" name="category_id">
                  @foreach($category as $i)
                  <option value="{{$i->id}}">{{$i->category}}</option>
                  @endforeach
              </select>
              </div>
            </div>
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-full px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="description">
                  Description
                </label>
                <textarea class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3  mb-3" id="description" name="description">
                </textarea>
              
              </div>
            </div>
            <div class="-mx-3 md:flex mb-2">
              <div class="md:w-1/2 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="qty">
                  Quantity
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="qty" name="qty" type="number" placeholder="Quantity">
              </div>
              <div class="md:w-1/2 px-3">
              <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="buy_price">
                  Cost
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="buy_price" name="buy_price" type="number" placeholder="Cost">
              </div>
              <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="sell_price">
                  Selling Price
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-grey-lighter rounded py-3 px-4" id="sell_price" name="sell_price" type="number" placeholder="Selling Price">
              </div>
            </div>
              @livewire('image')
            <div class="-mx-3 md:flex mb-4">
            <div class="justify-end flex-col items-end mt-2 md:w-full flex">
                  <button class="bg-blue-600 text-gray-100 rounded-lg px-4 py-2 text-lg" type="submit">
                    Create Item
                  </button>
            </div>
          </div>
          </div>
</form>
          <!-- End of Modal Content-->
          
          
          
        </div>
</dialog>
@endsection