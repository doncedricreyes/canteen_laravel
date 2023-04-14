<div class="bg-rose-50">

<div class="flex flex-row">
    <div class="w-1/4 py-5 px-5">
    <form wire:submit.prevent="search()" >
            <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                </div>
                <input wire:model.lazy="search" type="search" id="default-search" class="block p-4 pl-10 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 " placeholder="Search a recipe" >
                <button type="submit" class="text-white absolute right-2.5 bottom-2.5 bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>
    </form>
    </div>

<div class="w-1/4 py-5 px-5">
    <select id="category_id" name="category_id" wire:model="category_sort" wire:change='sort()' class="block p-4 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Recipe" required>
    <option value="all">All Categories</option>
 
    @foreach($category as $i)
    <option value="{{$i->id}}">{{$i->category}}</option>
    @endforeach
    </select>
</div>           
<div class="w-1/4 py-5 px-5">
<button type="button" class="bg-blue-600 text-gray-100 rounded-lg px-4 py-2 text-lg" onclick="document.getElementById('myModal').showModal()">
  Add Item
</button>
</div>
</div>
<div class="flex flex-wrap flex-row mx-auto justify-center py-10">



 @foreach($items as $i)
<div class='flex items-center justify-center mt-3 w-1/4  lg:w-1/4 sm:w-1/2  px-2'>
    <div class='w-full  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>

        <div class='max-w-36 mx-auto'>
          <div class='h-[208px]' style='background-image:url({{asset("images/$i->pic")}});background-size:cover;background-position:center'>
           </div>
          <div class='p-4 sm:p-6'>

            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>{{$i->name}}</p>
            <p class='text-[#7C7C80] font-[15px] h-[48px] overflow-auto '>{{$i->description}}</p>
            <p class='text-[#7C7C80] font-[15px] mt-6'>Qty. <span class="font-bold text-black">{{$i->qty}}</span></p>
            <p class='text-[#7C7C80] font-[15px] mt-1'>Price <span class="font-bold text-black">&#8369;{{$i->sell_price}}</span></p>


              <a href='/recipes/' class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80'>
                  View this item
              </a>


          </div>
        </div>

        
    </div>
</div>
@endforeach



</div>


</div>