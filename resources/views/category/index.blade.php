<!-- component -->
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  @vite('resources/css/app.css')
</head>

<body class="bg-white">
  @include('sweetalert::alert')
  <div class="top-0 flex items-center justify-center w-full h-full min-h-screen font-sans bg-gray-500 bg-opacity-60 backdrop-filter backdrop-blur-lg">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <div class="relative items-center justify-center w-1/2 p-2 px-6 m-auto mx-5 mx-auto bg-white h-1/3 sm:h-1/3 md:w-1/3 md:h-1/3 lg:w-full lg: lg:h-1/3 rounded-3xl filter drop-shadow-2xl">
      <div class="flex items-center justify-between p-1 border-black sm:mt-4">
        <div class="flex">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
              clip-rule="evenodd" />
          </svg>
          <p class="ml-1 text-sm font-bold tracking-wider text-gray-600 sm:text-md">
            Hehe
          </p>
        </div>
        <div class="flex items-center">
          <p class="hidden text-sm text-gray-600 lg:block">Have an account?</p>
          <a class="ml-1 text-sm text-blue-600 hover:underline sm:text-md" href="#">Log in</a>
        </div>
      </div>
      <div class="mt-3 sm:mt-5">
        <h1 class="text-sm text-xl font-black tracking-wider text-gray-600 sm:text-md">
          Manage your freelance business with us!
        </h1>
        <p class="mt-2 text-xs text-gray-400 sm:text-sm">
          Takes less than 10 minutes to fill out all the information needed to register
          your bussiness
        </p>
      </div>
      <div class="mt-1 sm:mt-8">
        <form action="/category" method="post"  class="flex flex-col">
        @csrf
          <label for="category" class="mt-1 text-xs text-gray-700 sm:mt-5 sm:text-md">Category Name</label>
          <input name="category" type="text" name="category" id="category" class="w-full h-4 border-b-2 border-gray-300 outline-none sm:h-9 focus:border-blue-300" required/>
        @error('category')
        <div class="text-lg font-bold text-red-700">
        {{ $message }}
    </div>
        @enderror
      </div>
      
      @if(session()->has('success'))
    <div class="text-lg font-bold text-green-700">
        {{ session()->get('success') }}
    </div>
    @endif
      <div class="flex flex-col items-center justify-center mt-2 sm:mt-8">
        <button class="w-20 h-8 p-1 text-xs text-gray-100 bg-blue-600 rounded-md sm:h-auto sm:rounded-lg sm:w-52 sm:text-md sm:p-3" type="submit">
          Get Started
        </button>
        </form>
        <p class="my-2 text-xs text-gray-600 sm:my-5 sm:text-md">
          By signing up you are agreeing to our
          <a href="#" class="text-xs text-black sm:text-md">Terms and Conditions</a>
        </p>
      </div>
    </div>
  </div>
  
</body>

</html>