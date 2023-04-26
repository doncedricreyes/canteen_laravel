@extends('layouts.navbar')

@section('content')
 
@livewire('item')








<dialog id="item_modal" class="w-11/12 h-auto p-5 bg-white rounded-md md:w-1/2 ">
        
   <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex items-center justify-center w-full h-auto">
          <div class="flex items-center justify-center w-10/12 h-auto py-3 text-2xl font-bold">
                Create New Item
          </div>
          <div onclick="document.getElementById('item_modal').close();" class="flex justify-center w-1/12 h-auto cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>

   
          <!--Header End-->
        </div>
          <!-- Modal Content-->
          <!-- component -->
          <form method="POST" action="/items/store" enctype="multipart/form-data">
              @csrf
          <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
            <div class="mb-6 -mx-3 md:flex">
              <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="name">
                  Item Name
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="name" name="name" type="text" placeholder="Item Name">
              </div>
              <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-last-name">
                  Category
                </label>
              <select class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="category_id" name="category_id">
                  @foreach($category as $i)
                  <option value="{{$i->id}}">{{$i->category}}</option>
                  @endforeach
              </select>
              </div>
            </div>
            <div class="mb-6 -mx-3 md:flex">
              <div class="px-3 md:w-full">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="description">
                  Description
                </label>
                <textarea class="block w-full py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" id="description" name="description">
                </textarea>
              
              </div>
            </div>
            <div class="mb-2 -mx-3 md:flex">
              <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="qty">
                  Quantity
                </label>
                <input class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" id="qty" name="qty" type="number" placeholder="Quantity">
              </div>
              <div class="px-3 md:w-1/2">
              <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="buy_price">
                  Cost
                </label>
                <input class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" id="buy_price" name="buy_price" type="number" placeholder="Cost">
              </div>
              <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="sell_price">
                  Selling Price
                </label>
                <input class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" id="sell_price" name="sell_price" type="number" placeholder="Selling Price">
              </div>
            </div>
              @livewire('image')
            <div class="mb-4 -mx-3 md:flex">
            <div class="flex flex-col items-end justify-end mt-2 md:w-full">
                  <button class="px-4 py-2 text-lg text-gray-100 bg-blue-600 rounded-lg" type="submit">
                    Create Item
                  </button>
            </div>
          </div>
          </div>
</form>
          <!-- End of Modal Content-->
          
          
          
        </div>
</dialog>



<script>
document.addEventListener('livewire:load', function () {
    Livewire.on('show-alert', function (data) {
        alert(data.message);
    });
});
</script>
@endsection