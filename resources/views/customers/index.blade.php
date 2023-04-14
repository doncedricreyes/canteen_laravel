@extends('layouts.navbar')

@section('content')


<button type="button" class="bg-blue-600 text-gray-100 rounded-lg px-4 py-2 text-lg" onclick="document.getElementById('myModal').showModal()">
  Add Item
</button>

<dialog id="myModal" class="h-auto w-11/12 md:w-11/12 p-5  bg-white rounded-md ">
        
   <div class="flex flex-col w-full h-auto ">
        <!-- Header -->
        <div class="flex w-full h-auto justify-center items-center">
          <div class="flex w-10/12 h-auto py-3 justify-center items-center text-2xl font-bold">
                Add New Customer
          </div>
          <div onclick="document.getElementById('myModal').close();" class="flex w-1/12 h-auto justify-center cursor-pointer">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
          </div>

   
          <!--Header End-->
        </div>
          <!-- Modal Content-->
          <!-- component -->
          <form method="POST" action="/customers/store" enctype="multipart/form-data">
              @csrf
          <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col my-2">
            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="lastname">
                  Last Name
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="lastname" name="lastname" type="text" placeholder="Last Name" required>
              </div>
              <div class="md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="firstname">
                  First Name
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="firstname" name="firstname" type="text" placeholder="First Name" required>
              </div>
              <div class="md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="middlename">
                  Middle Name
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="middlename" name="middlename" type="text" placeholder="Middle Name">
              </div>
            </div>

            <div class="-mx-3 md:flex mb-6">
              <div class="md:w-1/3 px-3 mb-6 md:mb-0">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="email">
                  Email
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="email" name="email" type="email" placeholder="Email Address">
              </div>
              <div class="md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="level">
                  Grade Level
                </label>
                <select class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="level" name="level">
                <option value="KINDER">Kinder</option>
                <option value="PREPARATORY">Preparatory</option>
                <option value="GRADE 1">Grade 1</option>
                <option value="GRADE 2">Grade 2</option>
                <option value="GRADE 3">Grade 3</option>
                <option value="GRADE 4">Grade 4</option>
                <option value="GRADE 5">Grade 5</option>
                <option value="GRADE 6">Grade 6</option>
                <option value="GRADE 7">Grade 7</option>
                <option value="GRADE 8">Grade 8</option>
                <option value="GRADE 9">Grade 9</option>
                <option value="GRADE 10">Grade 10</option>
                <option value="GRADE 11">Grade 11</option>
                <option value="GRADE 12">Grade 12</option>
                <option value="FACULTY">Faculty</option>
                </select>
              </div>
              <div class="md:w-1/3 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="section">
                  Section
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="section" name="section" type="text" placeholder="Section">
              </div>
            </div>
   
            <div class="-mx-3 md:flex mb-2">
            <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="rfid">
                  RFID
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="rfid" name="rfid" type="text" placeholder="RFID">
              </div>
              <div class="md:w-1/2 px-3">
                <label class="block uppercase tracking-wide text-grey-darker text-xs font-bold mb-2" for="balance">
                  Balance
                </label>
                <input class="appearance-none block w-full bg-grey-lighter text-grey-darker border border-red rounded py-3 px-4 mb-3" id="balance" name="balance" type="number" placeholder="Balance" value="0">
              </div>
            </div>
           
            <div class="-mx-3 md:flex mb-4">
            <div class="justify-end flex-col items-end mt-2 md:w-full flex">
                  <button class="bg-blue-600 text-gray-100 rounded-lg px-4 py-2 text-lg" type="submit">
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