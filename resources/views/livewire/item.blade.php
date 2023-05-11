<div class="bg-rose-50">
  @include('sweetalert::alert')
<div class="flex flex-row">
    <div class="w-1/4 px-5 py-5">
    <form wire:submit.prevent="search()" >
            <div class="relative">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input wire:model.lazy="search" type="search" id="default-search" class="block w-full p-4 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search a product" >
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
    </form>
    </div>

<div class="w-1/4 px-5 py-5">
    <select id="category_id" name="category_id" wire:model="category_sort" wire:change='sort()' class="block w-full p-4 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Recipe" required>
    <option value="all">All Categories</option>
 
    @foreach($category as $i)
    <option value="{{$i->id}}">{{$i->category}}</option>
    @endforeach
    </select>
</div>           
<div class="w-1/4 px-5 py-5">
<button type="button" class="px-4 py-2 text-lg text-gray-100 bg-blue-600 rounded-lg" onclick="document.getElementById('item_modal').showModal()">
  Add Item
</button>
</div>
</div>
<div class="flex flex-row flex-wrap justify-center py-10 mx-auto">



 @foreach($items as $i)
<div class='flex items-center justify-center w-1/4 px-2 mt-3 lg:w-1/4 sm:w-1/2'>
    <div class='w-full mx-auto overflow-hidden bg-white shadow-xl rounded-3xl'>

        <div class='mx-auto max-w-36'>
          <div class='h-[208px]' style='background-image:url({{asset("images/$i->pic")}});background-size:cover;background-position:center'>
           </div>
          <div class='p-4 sm:p-6'>

            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>{{$i->name}}</p>
            <p class='text-[#7C7C80] font-[15px] h-[48px] overflow-auto '>{{$i->description}}</p>
            <p class='text-[#7C7C80] font-[15px] mt-6'>Qty. <span class="font-bold text-black">{{$i->qty}}</span></p>
            <p class='text-[#7C7C80] font-[15px] mt-1'>Price <span class="font-bold text-black">&#8369;{{$i->sell_price}}</span></p>


              <a wire:click="edit_item({{$i->id}})" class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80 hover:cursor-pointer'>
                  View this item
              </a>

          </div>
        </div>     
    </div>
</div>
@endforeach

</div>



<dialog id="item_edit_modal" class="w-11/12 h-auto p-5 bg-white rounded-md md:w-1/2 ">
        
   <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex items-center justify-center w-full h-auto">
          <div class="flex items-center justify-center w-10/12 h-auto py-3 text-2xl font-bold">
                Edit Item
          </div>
          <div onclick="document.getElementById('item_edit_modal').close()"  class="flex justify-center w-1/12 h-auto cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>

   
          <!--Header End-->
        </div>
          <!-- Modal Content-->
          <!-- component -->
          @if($edit_items)@foreach($edit_items as $i)
          <form method="POST" action="/items/update/{{$i->id}}" enctype="multipart/form-data">
              @method('PUT')
              @csrf
              
          <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
            <div class="mb-6 -mx-3 md:flex">
              <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="name">
                  Item Name 
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="name" name="name" type="text" value="{{$i->name}}">
              </div>
              <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="grid-last-name">
                  Category 
                </label>
              <select class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="category_id_edit" name="category_id">
             
                  @foreach($category as $cat)
                  <option value="{{$cat->id}}">{{$cat->category}}</option>
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
                {{$i->description}}
                </textarea>
              
              </div>
            </div>
            <div class="mb-2 -mx-3 md:flex">
              <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="qty">
                  Quantity
                </label>
                <input class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" id="qty" name="qty" type="number" value="{{$i->qty}}">
              </div>
              <div class="px-3 md:w-1/2">
              <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="buy_price">
                  Cost
                </label>
                <input class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" id="buy_price" name="buy_price" type="number" value="{{$i->buy_price}}">
              </div>
              <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="sell_price">
                  Selling Price
                </label>
                <input class="block w-full px-4 py-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-grey-lighter" id="sell_price" name="sell_price" type="number" value="{{$i->sell_price}}">
              </div>
            </div>
              @livewire('image')
            <div class="mb-4 -mx-3 md:flex">
            <div class="flex flex-row items-end justify-end mt-2 md:w-full">
                  <button class="px-4 py-2 mr-5 text-lg text-gray-100 bg-blue-600 rounded-lg" type="submit">
                  Update
                  </button>
                  </form>
                  <form method="POST" action="/items/remove/{{$i->id}}" enctype="multipart/form-data">
                  @method('PUT')
                  @csrf
              <button class="px-4 py-2 text-lg text-gray-100 bg-red-600 rounded-lg" type="submit">
                  Remove
              </button>
              </form>
            </div>
          </div>
          </div>

       @endforeach @endif
          <!-- End of Modal Content-->
          
          
          
        </div>
</dialog>


<script>
document.addEventListener('livewire:load', function () {
    Livewire.on('show-modal', function (data) {
        document.getElementById('item_edit_modal').showModal();
    });
});
</script>
</div>

