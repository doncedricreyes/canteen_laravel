@extends('layouts.navbar')

@section('content')

@include('sweetalert::alert')

<main id="content" role="main" class="w-3/4  p-6 mx-auto">
    <div class="bg-white shadow-lg mt-7 rounded-xl dark:bg-gray-800 dark:border-gray-700">
      <div class="p-4 sm:p-7">
        <div class="text-center">
          <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Account Profile</h1>
          <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
           This page allows you to change your username and password.

          </p>
        </div>

        <div class="mt-5">
          <form method="POST" action="/profile">
          @method('PUT')
          @csrf
            <div class="grid gap-y-4">
              <div>
                <label for="name" class="block mb-2 ml-1 text-sm font-bold dark:text-white"><i class="fas fa-user"></i> Name</label>
                <div class="relative">
                   <input type="text" id="name" name="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{auth()->user()->name}}" autofocus>
                </div>
                <label for="username" class="block mt-4 mb-2 ml-1 text-sm font-bold dark:text-white"><i class="fas fa-user"></i> Username</label>
                <div class="relative">
                   <input type="text" id="username" name="username" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" value="{{auth()->user()->username}}" autofocus>
                </div>
                <label for="password" class="block mt-4 mb-2 ml-1 text-sm font-bold dark:text-white"><i class="fas fa-lock"></i> Password</label>
                <div class="relative">
                   <input type="password" id="password" name="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autofocus>
                </div>
                <label for="password_confirmation" class="block mt-4 mb-2 ml-1 text-sm font-bold dark:text-white"><i class="fas fa-check"></i> Confirm Password</label>
                <div class="relative">
                   <input type="password" id="password_confirmation" name="password_confirmation" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-5 p-2.5  dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autofocus>
                </div>                    
                <div class="flex flex-col items-end justify-end mt-4 md:w-full">
                    <button class="px-4 py-2 text-lg text-gray-100 bg-blue-600 rounded-lg" type="submit">
                        Update Information
                    </button>
                </div>
        
               

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>


  </main>



@endsection