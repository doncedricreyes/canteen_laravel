<div class="flex">
<!-- component -->
<!-- This is an example component -->

        <!-- aside -->
        <aside class="flex w-72 flex-col space-y-2 border-r-2 border-gray-200 bg-white p-2" style="height: 90.5vh"
            x-show="asideOpen">
            <ul class="space-y-2">
            <li>
					<a href="#" wire:click.prevent="sort('all')"
						class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
						<span class="ml-3">All Categories</span>
					</a>
				</li>
                @foreach($category as $i)
				<li>
					<a href="#" wire:click.prevent="sort({{$i->id}})"
						class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
						<span class="ml-3">{{$i->category}}</span>
					</a>
				</li>
                @endforeach
			</ul>
        </aside>
    
        <!-- main content page -->
        <div class="flex flex-wrap flex-row mx-auto justify-center py-10">
        @foreach($items as $i)
      
<div class='flex-grow-0 flex-shrink-0 items-center justify-center mt-3  px-2       @if($items->count() == 2)
lg:w-1/2 md:w-1/2 sm:2/3 @endif @if($items->count()>2) md:w-1/2  lg:w-1/4 sm:w-1/2 @endif @if($items->count()==1) w-96 @endif'>
    <div class='w-full  mx-auto bg-white rounded-3xl shadow-xl overflow-hidden'>

        <div class='max-w-36 mx-auto'>
          <div class='h-[208px]' style='background-image:url({{asset("images/$i->pic")}});background-size:cover;background-position:center'>
           </div>
          <div class='p-4 sm:p-6'>
        
            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>{{$i->name}}</p>
            <p class='text-[#7C7C80] font-[15px] h-[48px] overflow-auto '>{{$i->description}}</p>
            <p class='text-[#7C7C80] font-[15px] mt-6'>Qty. <span class="font-bold text-black">{{$i->qty}}</span></p>
            <p class='text-[#7C7C80] font-[15px] mt-1'>Price <span class="font-bold text-black">&#8369;{{$i->sell_price}}</span></p>


 
            <div x-data="{ count: 0 }">
              <a href=''       
                x-on:click="count=count+1"
              class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80' wire:click.prevent="add({{$i->id}})">
            <div class="t-0 absolute right-3">
             <p x-text="count" class="flex h-2 w-2 items-center justify-center rounded-full bg-red-500 p-3 text-xs text-white"> </p>
                    </div>
                  Add to cart
              </a>

              <button     
               :disabled="count === 0" x-bind:class="{ 'bg-gray-300 text-black': count === 0 }" x-on:click="count=count-1"
              class='block mt-3 w-full px-4 py-3 font-medium tracking-wide text-center capitalize text-white transition-colors duration-300 transform bg-red-600 rounded-[14px] hover:bg-red-200:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80' wire:click.prevent="remove({{$i->id}})">
                  Remove
              </button>
            </div>
       

          </div>
        </div>

        
    </div>
</div>
@endforeach

        </div>
    </div>

