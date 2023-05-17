@extends('layouts.navbar')

@section('content')
<div>
<dialog id="create_category_modal" class="w-1/2 p-5 bg-white rounded-md md:w-1/2 ">
        
   <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex items-center justify-center w-full h-auto">
          <div class="flex items-center justify-center w-10/12 h-auto py-3 text-2xl font-bold">
                Create New Category
          </div>
          <div onclick="document.getElementById('create_category_modal').close();" class="flex justify-center w-1/12 h-auto cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>

   
          <!--Header End-->
        </div>
          <!-- Modal Content-->
          <!-- component -->
          <form method="POST" action="/category" enctype="multipart/form-data">
              @csrf
          <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
            <div class="mb-6 -mx-3 md:flex">
              <div class="w-full px-3 mb-6 md:w-full md:mb-0">
                <label class="block mb-3 text-xs font-bold tracking-wide uppercase text-grey-darker" for="lastname">
                  Category Name
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="category" name="category" type="text" placeholder="Category Name" required>
      
              </div>
            </div>
           
            <div class="mb-4 -mx-3 md:flex">
            <div class="flex flex-col items-end justify-end mt-2 md:w-full">
                  <button class="px-4 py-2 text-lg text-gray-100 bg-blue-600 rounded-lg" type="submit">
                    Confirm
                  </button>
            </div>
          </div>
          </div>
</form>
          <!-- End of Modal Content-->
          
          
          
        </div>
</dialog>

@foreach($category as $i)
<dialog id="edit_category_modal-{{$i->id}}" class="w-1/2 p-5 bg-white rounded-md md:w-1/2 ">
        
   <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex items-center justify-center w-full h-auto">
          <div class="flex items-center justify-center w-10/12 h-auto py-3 text-2xl font-bold">
                Create New Category
          </div>
          <div onclick="document.getElementById('edit_category_modal-{{$i->id}}').close();" class="flex justify-center w-1/12 h-auto cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>

   
          <!--Header End-->
        </div>
          <!-- Modal Content-->
          <!-- component -->
          <form method="POST" action="/category/{{$i->id}}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
          <div class="flex flex-col px-8 pt-6 pb-8 my-2 mb-4 bg-white rounded shadow-md">
            <div class="mb-6 -mx-3 md:flex">
              <div class="w-full px-3 mb-6 md:w-full md:mb-0">
                <label class="block mb-3 text-xs font-bold tracking-wide uppercase text-grey-darker" for="lastname">
                  Category Name
                </label>
                <input class="block w-full px-4 py-3 mb-3 border rounded appearance-none bg-grey-lighter text-grey-darker border-red" id="category" name="category" type="text" placeholder="Category Name" value="{{$i->category}}" required>
      
              </div>
            </div>
           
            <div class="mb-4 -mx-3 md:flex">
            <div class="flex flex-col items-end justify-end mt-2 md:w-full">
                  <button class="px-4 py-2 text-lg text-gray-100 bg-blue-600 rounded-lg" type="submit">
                    Confirm
                  </button>
            </div>
          </div>
          </div>
</form>
          <!-- End of Modal Content-->
          
          
          
        </div>
</dialog>
@endforeach
<section class="container px-4 mx-auto">
@include('sweetalert::alert')
    <div class="sm:flex sm:items-center sm:justify-between">




    
        
    </div>

    <div class="mt-6 md:flex md:items-center md:justify-between">
          <div>
            <div class="flex items-center gap-x-3">
                <h1 class="mt-10 text-xl font-medium text-gray-800 dark:text-white">Categories</h1>
           
                <span class="px-3 py-1 mt-10 text-xs text-blue-600 bg-blue-100 rounded-full dark:bg-gray-800 dark:text-blue-400">{{$category->total()}}</span>
            </div>

            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">The total number of categories active in the system.</p>
        </div>

        <button onclick="document.getElementById('create_category_modal').showModal()" class="flex items-center justify-center w-1/2 px-5 py-2 text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>

                <span>Add Category</span>
            </button>
    </div>

    <div class="flex flex-col mt-6">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle md:px-6 lg:px-8">
                <div class="overflow-hidden border border-gray-200 dark:border-gray-700 md:rounded-lg">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-800">
                            <tr>
                            <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                              #
                            </th>
                                <th scope="col" class="py-3.5 px-4 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    <button class="flex items-center gap-x-3 focus:outline-none">
                                        <span>Category Name</span>

                                        <svg class="h-3" viewBox="0 0 10 11" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M2.13347 0.0999756H2.98516L5.01902 4.79058H3.86226L3.45549 3.79907H1.63772L1.24366 4.79058H0.0996094L2.13347 0.0999756ZM2.54025 1.46012L1.96822 2.92196H3.11227L2.54025 1.46012Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M0.722656 9.60832L3.09974 6.78633H0.811638V5.87109H4.35819V6.78633L2.01925 9.60832H4.43446V10.5617H0.722656V9.60832Z" fill="currentColor" stroke="currentColor" stroke-width="0.1" />
                                            <path d="M8.45558 7.25664V7.40664H8.60558H9.66065C9.72481 7.40664 9.74667 7.42274 9.75141 7.42691C9.75148 7.42808 9.75146 7.42993 9.75116 7.43262C9.75001 7.44265 9.74458 7.46304 9.72525 7.49314C9.72522 7.4932 9.72518 7.49326 9.72514 7.49332L7.86959 10.3529L7.86924 10.3534C7.83227 10.4109 7.79863 10.418 7.78568 10.418C7.77272 10.418 7.73908 10.4109 7.70211 10.3534L7.70177 10.3529L5.84621 7.49332C5.84617 7.49325 5.84612 7.49318 5.84608 7.49311C5.82677 7.46302 5.82135 7.44264 5.8202 7.43262C5.81989 7.42993 5.81987 7.42808 5.81994 7.42691C5.82469 7.42274 5.84655 7.40664 5.91071 7.40664H6.96578H7.11578V7.25664V0.633865C7.11578 0.42434 7.29014 0.249976 7.49967 0.249976H8.07169C8.28121 0.249976 8.45558 0.42434 8.45558 0.633865V7.25664Z" fill="currentColor" stroke="currentColor" stroke-width="0.3" />
                                        </svg>
                                    </button>
                                </th>

                                <th scope="col" class="px-12 py-3.5 text-sm font-normal text-left rtl:text-right text-gray-500 dark:text-gray-400">
                                    Status
                                </th>

                                <th scope="col" class="px-4 py-3.5 text-sm font-normal  text-gray-500 dark:text-gray-400">
                                   Action
                                </th>

                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200 dark:divide-gray-700 dark:bg-gray-900">
                            
                       @foreach($category as $i)
                            <tr>
                              <td class="px-4 py-4">
                                {{ $loop->iteration + ($category->currentPage() - 1) * $category->perPage() }}.
                              </td>
                                <td class="px-4 py-4 text-sm font-medium whitespace-nowrap">
                                    <div>
                                        <h2 class="font-medium text-gray-800 dark:text-white ">{{$i->category}}</h2>
                                    </div>
                                </td>
                                <td class="px-12 py-4 text-sm font-medium whitespace-nowrap">
                                       @if($i->status == 1)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                                            Active
                                          </span>
                                      @endif
                                       @if($i->status == 0) 
                                       <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">
                                          Inactive
                                          </span> 
                                       @endif
                                </td>
                                <td class="px-4 py-4 text-sm whitespace-nowrap ">
                                <div class="flex flex-row ">
                                    
                                    <button onclick="document.getElementById('edit_category_modal-{{$i->id}}').showModal()" class="flex items-center justify-center w-full px-3 py-2 m-auto text-sm tracking-wide text-white transition-colors duration-200 bg-blue-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-blue-600 dark:hover:bg-blue-500 dark:bg-blue-600">
                                      <span><i class="mr-1 fas fa-pencil-alt"></i> Edit</span>
                                    </button>

                        <form action="/category/remove/{{$i->id}}" method="POST" class="delete-form">
                            @csrf
                            @method('PUT')
                                  @if($i->status == 1)
                                      <button id="remove"  class="flex items-center justify-center w-full px-3 py-2 mr-8 text-sm tracking-wide text-white transition-colors duration-200 bg-red-500 rounded-lg delete-button shrink-0 sm:w-auto gap-x-2 hover:bg-red-600 " data-item-id="{{ $i->id }}" >    
                                        <span><i class="mr-1 fas fa-trash-alt"></i> Remove</span>
                                    </button>
                                  @endif
                        </form>
                         <form action="/category/restore/{{$i->id}}" method="POST" >
                            @csrf
                            @method('PUT')
                                  @if($i->status == 0)
                                      <button id="restore" class="flex items-center justify-center w-full px-3 py-2 mr-8 text-sm tracking-wide text-white transition-colors duration-200 bg-green-500 rounded-lg shrink-0 sm:w-auto gap-x-2 hover:bg-green-600 ">    
                                        <span><i class="mr-1 fas fa-undo"></i> Restore</span>
                                    </button>
                                  @endif
                                     </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
   
 

<div class="mt-5 mb-3">     
{{ $category->links() }}

</div>  
   
</section>




</div>

@endsection