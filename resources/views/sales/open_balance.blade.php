@extends('layouts.navbar')

@section('content')

<div class="container p-4 mx-auto mt-10 rounded-lg shadow-lg">
  <form method="POST" action="/open_balance">
  @csrf
    <h2 class="mb-4 text-2xl font-bold">Set Up Account</h2>
    <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="opening-balance">
        Opening Balance
      </label>
      <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline" id="opening_balance" name="opening_balance" type="number" placeholder="0.00">
    </div>
    <div class="mb-4">
      <label class="block mb-2 font-bold text-gray-700" for="current-date">
        Current Date
      </label>
      <input class="w-full px-3 py-2 leading-tight text-gray-700 border rounded appearance-none focus:outline-none focus:shadow-outline" id="current-date" type="text" value="<?php echo date('Y-m-d'); ?>" readonly>
    </div>
    <div class="flex items-center justify-between">
      <button type="submit" class="px-4 py-2 ml-auto font-bold text-white bg-blue-500 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline" type="button">
        Submit
      </button>
    </div>
  </form>
</div>

@endsection