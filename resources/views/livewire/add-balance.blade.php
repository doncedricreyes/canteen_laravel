<div>
<main id="content" role="main" class="w-full max-w-md p-6 mx-auto">
    <div class="bg-white shadow-lg mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Add Balance</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
           To add balance, simply tap your ID and enter the corresponding amount.

          </p>
        </div>

        <div class="mt-5">
 
            <div class="grid gap-y-4">
              <div>
                <label for="rfid" class="block mb-2 ml-1 text-sm font-bold dark:text-white">RFID</label>
                <div class="relative">
                   <input wire:model="rfid" wire:keydown.enter.prevent="balance()" type="password" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="************" autofocus>
                </div>

          

                <p class="hidden mt-2 text-xs text-red-600" id="email-error">Please include a valid email address so we can get back to you</p>
              
              @if($balance)
              @foreach($balance as $i)
            
            <label for="name" class="block mt-3 mb-2 ml-1 text-sm font-bold dark:text-white">Customer Name</label>
            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{$i->lastname}}, {{$i->firstname}} {{$i->middlename}}" disabled>

            <label for="current_balance" class="block mt-3 mb-2 ml-1 text-sm font-bold dark:text-white">Current Balance</label>
            <input type="text" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="Your Balance is {{$i->balance}}" disabled>
             
               @endforeach
              @endif
                <form wire:submit.prevent="add_balance">
                    <label for="add_balance" class="block mt-3 mb-2 ml-1 text-sm font-bold dark:text-white">Add Balance</label>
                <div class="relative">
                   <input wire:model="add_balance"  type="text" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="&#x20b1;0.00">

                <div class="flex flex-col mt-4 md:w-full">
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