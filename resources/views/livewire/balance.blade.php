<div>
<main id="content" role="main" class="w-full max-w-md p-6 mx-auto">
    <div class="bg-white shadow-lg mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Check Balance</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
           Tap your ID to view your balance.

          </p>
        </div>

        <div class="mt-5">
          <form>
            <div class="grid gap-y-4">
              <div>
                <label for="rfid" class="block mb-2 ml-1 text-sm font-bold dark:text-white">RFID</label>
                <div class="relative">
                   <input wire:model="rfid" wire:keydown.enter.prevent="balance()" type="password" id="input-group-1" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="***********" autofocus>
                </div>
             
            
                <p class="mt-2 text-xs text-red-600 " id="email-error">Please include a valid email address so we can get back to you</p>
            
            
              @if($balance)
              @foreach($balance as $i)
              <label  class="block mt-3 mb-1 ml-1 text-sm font-bold dark:text-white">Name</label>
               <input type="text" value="{{$i->lastname}}, {{$i->firstname}} {{$i->middlename}}" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
               <p class="mt-2 text-lg text-black" id="email-error"></p>
               <label  class="block mt-2 mb-1 ml-1 text-sm font-bold dark:text-white">Balance</label>
                <input type="text" value="Your Balance is &#x20b1;{{$i->balance}}" class=" bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" disabled>
                <p class="mt-2 text-lg text-black" id="email-error"></p>
               @endforeach
              @endif
              </div>

            </div>
          </form>
        </div>
      </div>
    </div>

    <p class="flex items-center justify-center mt-3 text-center divide-x divide-gray-300 dark:divide-gray-700">
      <a class="pr-3.5 inline-flex items-center gap-x-2 text-sm text-gray-600 decoration-2 hover:underline hover:text-blue-600 dark:text-gray-500 dark:hover:text-gray-200" href="/sales">
        Back
      </a>
      <a class="inline-flex items-center pl-3 text-sm text-gray-600 gap-x-2 decoration-2 hover:underline hover:text-blue-600 dark:text-gray-500 dark:hover:text-gray-200" href="balance">
        
        Refresh
      </a>
    </p>
  </main>
  </div>