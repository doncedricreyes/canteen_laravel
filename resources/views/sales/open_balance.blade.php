@extends('layouts.navbar')
@include('sweetalert::alert')
@section('content')
 
 
 <div class="px-5 m-5 bg-white shadow-lg mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800 dark:text-white"><i class="fa fa-balance-scale-right"></i> Opening Balance</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
           The opening balance should be the actual amount of money that you have in your cash register at the beginning of the day.

          </p>
        </div>

        <div class="mt-5">
        <form method="POST" action="/open_balance">
            @csrf
            <div class="grid gap-y-4">
              <div>
                <label for="rfid" class="block mb-2 ml-1 text-sm font-bold dark:text-white">Current Date</label>
                <div class="relative">
                  <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="current-date" type="text" value="<?php echo date('Y-m-d'); ?>" readonly>
                </div>  
              
                    <label for="opening_balance" class="block mt-3 mb-2 ml-1 text-sm font-bold dark:text-white">Opening Balance</label>
                <div class="relative">
                   <input class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="opening_balance" name="opening_balance" type="number" placeholder="0.00"  min="0" required>

                <div class="flex items-center justify-between">
                  <button class="px-4 py-2 mt-5 ml-auto text-lg text-gray-100 bg-blue-600 rounded-lg" type="submit">
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

@endsection