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
  <div class="
            font-sans
            bg-gray-500 bg-opacity-60
            w-full
            min-h-screen
            flex justify-center flex items-center
            h-full 
            top-0
            backdrop-filter backdrop-blur-lg 
        ">
    <link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet" />
    <div class="
                px-6
                p-2
                bg-white
                relative
                justify-center
                items-center
                w-1/2 
                m-auto 
                mx-auto
                h-1/3
                sm:h-1/3
                md:w-1/3
                md:h-1/3
                lg:w-full 
                lg: mx-5
                lg:h-1/3
                rounded-3xl
                filter
                drop-shadow-2xl
            ">
      <div class="flex p-1 sm:mt-4 border-black items-center justify-between">
        <div class="flex">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-blue-400" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd"
              d="M4 2a2 2 0 00-2 2v11a3 3 0 106 0V4a2 2 0 00-2-2H4zm1 14a1 1 0 100-2 1 1 0 000 2zm5-1.757l4.9-4.9a2 2 0 000-2.828L13.485 5.1a2 2 0 00-2.828 0L10 5.757v8.486zM16 18H9.071l6-6H16a2 2 0 012 2v2a2 2 0 01-2 2z"
              clip-rule="evenodd" />
          </svg>
          <p class="text-gray-600 tracking-wider ml-1 text-sm sm:text-md font-bold">
            Hehe
          </p>
        </div>
        <div class="flex items-center">
          <p class="text-gray-600 hidden text-sm lg:block">Have an account?</p>
          <a class="text-blue-600 ml-1 hover:underline text-sm sm:text-md" href="#">Log in</a>
        </div>
      </div>
      <div class="mt-3  sm:mt-5">
        <h1 class="text-xl text-gray-600 tracking-wider text-sm sm:text-md font-black">
          Manage your freelance business with us!
        </h1>
        <p class="text-xs sm:text-sm text-gray-400 mt-2">
          Takes less than 10 minutes to fill out all the information needed to register
          your bussiness
        </p>
      </div>
      <div class="mt-1 sm:mt-8">
        <form action="/category" method="post"  class="flex-col flex">
        @csrf
          <label for="category" class="text-gray-700 mt-1 sm:mt-5 text-xs sm:text-md">Category Name</label>
          <input name="category" type="text" name="category" id="category" class="
                                w-full
                                h-4
                                sm:h-9
                                border-b-2 border-gray-300
                                focus:border-blue-300
                                outline-none
                            " required/>
        @error('category')
        <div class="text-lg text-red-700 font-bold">
        {{ $message }}
    </div>
        @enderror
      </div>
      
      @if(session()->has('success'))
    <div class="text-lg text-green-700 font-bold">
        {{ session()->get('success') }}
    </div>
    @endif
      <div class="justify-center flex-col items-center mt-2 sm:mt-8 flex">
        <button class="
                        bg-blue-600
                        text-gray-100
                        rounded-md
                        h-8
                        sm:h-auto
                        sm:rounded-lg
                        w-20
                        sm:w-52
                        p-1
                        text-xs
                        sm:text-md
                        sm:p-3
                    " type="submit">
          Get Started
        </button>
        </form>
        <p class="text-gray-600 text-xs my-2 sm:my-5 sm:text-md">
          By signing up you are agreeing to our
          <a href="#" class="text-black text-xs sm:text-md">Terms and Conditions</a>
        </p>
      </div>
    </div>
  </div>
</body>

</html>