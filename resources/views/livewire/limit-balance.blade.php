<div>
<main id="content" role="main" class="w-full max-w-md mx-auto p-6">
    <div class="mt-7 bg-white  rounded-xl shadow-lg dark:bg-gray-800 dark:border-gray-700">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Check Balance</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
           Tap your ID to view your balance.

          </p>
        </div>

        <div class="mt-5">
 
            <div class="grid gap-y-4">
              <div>
                <label for="rfid" class="block text-sm font-bold ml-1 mb-2 dark:text-white">RFID</label>
                <div class="relative">
                   <input wire:model="rfid" wire:keydown.enter.prevent="balance()" type="password" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="************" autofocus>
                </div>

          

                <p class="hidden text-xs text-red-600 mt-2" id="email-error">Please include a valid email address so we can get back to you</p>
              
              @if($balance)
              @foreach($balance as $i)
            
            <label for="name" class="block text-sm font-bold ml-1 mb-2 mt-3 dark:text-white">Customer Name</label>
            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$i->lastname}}, {{$i->firstname}} {{$i->middlename}}" disabled>

            <label for="current_balance" class="block text-sm font-bold ml-1 mb-2 mt-3 dark:text-white">Current Balance</label>
            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Your Balance is {{$i->limit}}" disabled>
             
               @endforeach
              @endif
                <form wire:submit.prevent="add_limit">
                    <label for="add_balance" class="block text-sm font-bold ml-1 mb-2 mt-3 dark:text-white">Spending Limit</label>
                <div class="relative">
                   <input wire:model="add_limit"  type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@flowbite.com">

                <div class="flex flex-col items-end justify-end mt-2 md:w-full">
                  <button class="px-4 py-2 text-lg text-gray-100 bg-blue-600 rounded-lg" type="submit">
                    Confirm
                  </button>
                  </form>
            </div>

                </div>
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>


  </main>
  </div>