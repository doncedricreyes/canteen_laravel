@extends('layouts.navbar')

@section('content')

<button type="button" class="px-4 py-2 text-lg text-gray-100 bg-blue-600 rounded-lg" onclick="document.getElementById('add_user_modal').showModal()">
  Add User
</button>

<dialog id="add_user_modal" class="w-11/12 h-auto p-5 bg-white rounded-md md:w-11/12 ">
        
   <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex items-center justify-center w-full h-auto">
          <div class="flex items-center justify-center w-10/12 h-auto py-3 text-2xl font-bold">
                Add New Customer
          </div>
          <div onclick="document.getElementById('add_user_modal').close();" class="flex justify-center w-1/12 h-auto cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>

   
          <!--Header End-->
        </div>
          <!-- Modal Content-->
          <!-- component -->
          <form method="POST" action="/users/store" enctype="multipart/form-data">
              @csrf
          <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
            <div class="mb-6 -mx-3 md:flex">
              <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="name">
                  Name
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="name" name="name" type="text" placeholder="Name" required>
              </div>
              <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="firstname">
                  Username
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="username" name="username" type="text" placeholder="User Name" required>
              </div>
            </div>

            <div class="mb-6 -mx-3 md:flex">
              <div class="px-3 mb-6 md:w-1/2 md:mb-0">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="email">
                  Email
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="email" name="email" type="email" placeholder="Email Address">
              </div>
              <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="role">
                 Role
                </label>
                <select class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="role" name="role">
                <option value="Admin">Admin</option>
                <option value="Canteen">Canteen</option>
                <option value="Cashier">Cashier</option>
                </select>
              </div>

            </div>
   
            <div class="mb-2 -mx-3 md:flex">
            <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="password">
                  Password
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="password" name="password" type="password" placeholder="Password" required>
              </div>
              <div class="px-3 md:w-1/2">
                <label class="block mb-2 text-xs font-bold tracking-wide uppercase text-grey-darker" for="password_confirmation" required>
                  Confirm Password
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="password_confirmation" name="password_confirmation" type="password" placeholder="Confirm Password">
              </div>
            </div>
           
            <div class="mb-4 -mx-3 md:flex">
            <div class="flex flex-col items-end justify-end mt-2 md:w-full">
                  <button class="px-4 py-2 text-lg text-gray-100 bg-blue-600 rounded-lg" type="submit">
                    Add Customer
                  </button>
            </div>
          </div>
          </div>
</form>
          <!-- End of Modal Content-->
          
          
          
        </div>
</dialog>

@endsection