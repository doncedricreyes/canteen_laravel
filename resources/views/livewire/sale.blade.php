<div class="flex">
@include('sweetalert::alert')


        <aside class="overflow-scroll sticky top-0 flex flex-col p-2 space-y-2 bg-white border-r-2 border-gray-200 w-72" style="height: 90.5vh"
            x-show="asideOpen">
            <ul class="space-y-2">
            <li>
					<a href="#" wire:click.prevent="sort('all')"
						class="flex items-center p-2 py-5 text-lg  font-normal text-gray-900 rounded-lg  hover:bg-blue-200 shadow-md">
						<span class="ml-3">All Categories</span>
					</a>
				</li>
                @foreach($category as $i)
				<li>
					<a href="#" wire:click.prevent="sort({{$i->id}})"
						class="flex items-center p-2 py-5 text-lg  font-normal text-gray-900 rounded-lg  hover:bg-blue-200 shadow-md">
						<span class="ml-3">{{$i->category}}</span>
					</a>
				</li>
                @endforeach
			</ul>
        </aside>
    
        <!-- main content page -->
    
        <div class="flex flex-row flex-wrap justify-center py-10 mx-auto">   
        @foreach($items as $i)
      
<div class='flex-grow-0 flex-shrink-0 items-center justify-center mt-10 px-2 @if($items->count() == 2)
lg:w-1/2 md:w-1/2 sm:2/3 @endif @if($items->count()>2) md:w-1/2  lg:w-1/4 sm:w-1/2 @endif @if($items->count()==1) w-96 @endif'>
    <div class='w-full mx-auto overflow-hidden bg-white shadow-xl rounded-3xl'>

        <div class='mx-auto max-w-36'>
          <div class='h-[208px]' style='background-image:url({{asset("images/$i->pic")}});background-size:cover;background-position:center'>
           </div>
          <div class='p-4 sm:p-6'>
        
            <p class='font-bold text-gray-700 text-[22px] leading-7 mb-1'>{{$i->name}}</p>
            <p class='text-[#7C7C80] font-[15px] h-[48px] overflow-auto '>{{$i->description}}</p>
            <p class='text-[#7C7C80] font-[15px] mt-6'>Qty. <span class="font-bold text-black">{{$i->qty}}</span></p>
            <p class='text-[#7C7C80] font-[15px] mt-1'>Price <span class="font-bold text-black">&#8369;{{$i->sell_price}}</span></p>


 
            <div x-data="{ count: 0, check:{{$i->qty}} }">
              <button       
                x-on:click="count=count+1" :disabled="count === check"
              class='block mt-10 w-full px-4 py-3 font-medium tracking-wide text-center capitalize transition-colors duration-300 transform bg-[#FFC933] rounded-[14px] hover:bg-[#FFC933DD] focus:outline-none focus:ring focus:ring-teal-300 focus:ring-opacity-80' wire:click.prevent="add({{$i->id}})">
            <div class="absolute t-0 right-3">
             <p x-text="count" class="flex items-center justify-center w-2 h-2 p-3 text-xs text-white bg-red-500 rounded-full"> </p>
                    </div>
                  Add to cart
              </button>

              <button     
               :disabled="count === 0" x-bind:class="{ 'bg-red-200 text-black': count === 0 }" x-on:click="count=count-1"
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
        <dialog id="payment_modal" class="w-11/12 h-auto p-5 bg-white rounded-md md:w-1/2 ">
        
        <div class="flex flex-col w-full h-auto ">
             <!-- Header -->
             <div class="flex items-center justify-center w-full h-auto">
               <div class="flex items-center justify-center w-10/12 h-auto py-3 text-2xl font-bold">
                     Select Mode Of Payment
               </div>
               <div onclick="document.getElementById('payment_modal').close();" class="flex justify-center w-1/12 h-auto cursor-pointer">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
               </div>
               <!--Header End-->
             </div>
               <!-- Modal Content-->
               <!-- component -->
       
            <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
               <div class="flex flex-row items-center justify-center w-full h-96 bg-zinc-600">
                    <button class="relative h-20 m-5 text-center transition-all duration-500 w-60 before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-zinc-400 before:transition-all before:duration-300 before:opacity-10 before:hover:opacity-0 before:hover:scale-50 after:absolute after:top-0 after:left-0 after:w-full after:h-full after:opacity-0 after:transition-all after:duration-300 after:border after:border-white/50 after:scale-125 after:hover:opacity-100 after:hover:scale-100" >
                        <span class="relative font-thin text-white uppercase">Cash</span>
                    </button>
                    <button onclick="document.getElementById('card_modal').showModal();" class="relative h-20 m-5 text-center transition-all duration-500 w-60 before:absolute before:top-0 before:left-0 before:w-full before:h-full before:bg-zinc-400 before:transition-all before:duration-300 before:opacity-10 before:hover:opacity-0 before:hover:scale-50 after:absolute after:top-0 after:left-0 after:w-full after:h-full after:opacity-0 after:transition-all after:duration-300 after:border after:border-white/50 after:scale-125 after:hover:opacity-100 after:hover:scale-100" >
                        <span class="relative font-thin text-white uppercase">Card</span>
                    </button>
                </div>
            </div>
        </div>
     </dialog>

     <dialog id="card_modal" class="w-11/12 h-auto p-5 bg-white rounded-md md:w-1/2 ">
        
        <div class="flex flex-col w-full h-auto ">
             <!-- Header -->
             <div class="flex items-center justify-center w-full h-auto">
               <div class="flex items-center justify-center w-10/12 h-auto py-3 text-2xl font-bold">
                     Card Payment
               </div>
               <div onclick="document.getElementById('card_modal').close();" class="flex justify-center w-1/12 h-auto cursor-pointer">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
               </div>
               <!--Header End-->
             </div>
               <!-- Modal Content-->
               <!-- component -->
       
            <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">

            <input wire:model.lazy="rfid" wire:keydown.enter="card_payment" type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

                </div>
            </div>
        </div>
     </dialog>
    </div>

