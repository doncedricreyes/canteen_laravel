<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />  

    <title>Document</title>
    @vite('resources/css/app.css')
  
    @livewireStyles
</head>
<body class="bg-purple-50">
    <!-- component -->



      <!-- navbar -->
    <nav class="flex justify-between text-white bg-gray-900">
      <div class="flex items-center w-full px-5 py-6 xl:px-12">
        <a class="text-3xl font-bold font-heading" href="#">
          <!-- <img class="h-9" src="logo.png" alt="logo"> -->
          Logo Here.
        </a>
        <!-- Nav Links -->
        <ul class="hidden px-2 mx-auto space-x-12 font-semibold md:flex font-heading">
        
        
        <div @click.away="open_inventory = false" class="relative" x-data="{ open_inventory: false }">
          <li><a @click="open_inventory = !open_inventory" class="cursor-pointer hover:text-gray-200">Inventory</a></li>

        <div x-show="open_inventory" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
        
          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/items"><i class="mr-1 fas fa-warehouse"></i> Manage Inventory</a>
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/category"><i class="fa fa-tag"></i> Manage Category</a>
          </div>
        </div>
      </div>

          <li><a class="hover:text-gray-200" href="/sales">Point of Sales</a></li>
          
      <div @click.away="open_customer = false" class="relative" x-data="{ open_customer: false }">
          <li><a @click="open_customer = !open_customer" class="cursor-pointer hover:text-gray-200">Customers</a></li>

        <div x-show="open_customer" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
        
          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/customers"><i class="mr-1 fas fa-users"></i> View Customers</a>
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/customers/balance/add"><i class="mr-1 fas fa-money-bill-wave"></i> Add Balance</a>
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:cursor-pointer" href="/customers/balance" ><i class="mr-1 fas fa-balance-scale"></i> Check Balance</a>
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:cursor-pointer" href="/customers/balance/limit" ><i class="mr-1 fas fa-dollar-sign"></i> Spending Limit</a>
          </div>
        </div>
      </div>
      
      <div @click.away="open_report = false" class="relative" x-data="{ open_report: false }">
          <li><a @click="open_report = !open_report" class="cursor-pointer hover:text-gray-200">Reports</a></li>

        <div x-show="open_report" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
        
          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/customers">View Customers</a>
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/customers/balance/add">Add Balance</a>
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:cursor-pointer" href="/customers/balance" >Check Balance</a>
              <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline hover:cursor-pointer" href="/customers/balance/limit" >Spending Limit</a>
          </div>
        </div>
      </div>
        </ul>
        <!-- Header Icons -->
        <div class="items-center hidden space-x-5 xl:flex">
       
   @livewire('cart')
          <!-- Sign In / Register      -->


  <div @click.away="open = false" class="relative" x-data="{ open: false }">
          <a  @click="open = !open" class="flex items-center hover:text-gray-200" href="#">
              <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5.121 17.804A13.937 13.937 0 0112 16c2.5 0 4.847.655 6.879 1.804M15 10a3 3 0 11-6 0 3 3 0 016 0zm6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
          </a>
        <div x-show="open" x-transition:enter="transition ease-out duration-100" x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100" x-transition:leave-end="transform opacity-0 scale-95" class="absolute right-0 w-full mt-2 origin-top-right rounded-md shadow-lg md:w-48">
          <div class="px-2 py-2 bg-white rounded-md shadow dark-mode:bg-gray-800">
            <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/profile"><i class="mr-1 fas fa-user"></i> Profile</a>
            @if(Auth()->user()->role == 'Admin')
            <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/users"><i class="mr-1 fas fa-users"></i> Users</a>
           @endif
            <a class="block px-2 py-2 mt-2 text-sm font-semibold text-black bg-transparent rounded-lg dark-mode:bg-transparent dark-mode:hover:bg-gray-600 dark-mode:focus:bg-gray-600 dark-mode:focus:text-white dark-mode:hover:text-white dark-mode:text-gray-200 md:mt-0 hover:text-gray-900 focus:text-gray-900 hover:bg-gray-200 focus:bg-gray-200 focus:outline-none focus:shadow-outline" href="/logout"><i class="mr-1 fas fa-sign-out-alt"></i> Logout</a>
          </div>
        </div>
      </div>   
          
        </div>
      </div>
      <!-- Responsive navbar -->
      <a class="flex items-center mr-6 xl:hidden" href="#">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
        </svg>
        <span class="absolute flex ml-4 -mt-5">

          </span>
        </span>
      </a>
      <a class="self-center mr-12 navbar-burger xl:hidden" href="#">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 hover:text-gray-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
      </a>
    </nav>
    
 
  

    @yield('content')

    @livewireScripts
</body>

</html>