<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <title>Document</title>
    @vite('resources/css/app.css')
   
 
</head>
<body>
 @include('sweetalert::alert')
<!-- component -->
<div class="flex items-center justify-center h-screen overflow-hidden bg-blue-500">
  <div class="w-10/12 bg-white lg:w-5/12 md:6/12 shadow-3xl">
    <div class="absolute transform -translate-x-1/2 -translate-y-1/2 bg-gray-800 rounded-full left-1/2 md:p-4">
      <img src="{{asset('images/St. Andrew.jpg')}}" width="100" height="100" class="rounded-full">

    </div>
    <form method="POST" action="/login" class="p-12 md:p-24">
    @csrf
      <div class="flex items-center mb-6 text-lg md:mb-8">
        <svg class="absolute ml-3" width="24" viewBox="0 0 24 24">
          <path d="M20.822 18.096c-3.439-.794-6.64-1.49-5.09-4.418 4.72-8.912 1.251-13.678-3.732-13.678-5.082 0-8.464 4.949-3.732 13.678 1.597 2.945-1.725 3.641-5.09 4.418-3.073.71-3.188 2.236-3.178 4.904l.004 1h23.99l.004-.969c.012-2.688-.092-4.222-3.176-4.935z"/>
        </svg>
        <input type="text" id="username" name="username" class="w-full py-2 pl-12 bg-gray-200 md:py-4 focus:outline-none" placeholder="Username" required/>
      </div>
      <div class="flex items-center mb-4 text-lg md:mb-4">
        <svg class="absolute ml-3" viewBox="0 0 24 24" width="24">
          <path d="m18.75 9h-.75v-3c0-3.309-2.691-6-6-6s-6 2.691-6 6v3h-.75c-1.24 0-2.25 1.009-2.25 2.25v10.5c0 1.241 1.01 2.25 2.25 2.25h13.5c1.24 0 2.25-1.009 2.25-2.25v-10.5c0-1.241-1.01-2.25-2.25-2.25zm-10.75-3c0-2.206 1.794-4 4-4s4 1.794 4 4v3h-8zm5 10.722v2.278c0 .552-.447 1-1 1s-1-.448-1-1v-2.278c-.595-.347-1-.985-1-1.722 0-1.103.897-2 2-2s2 .897 2 2c0 .737-.405 1.375-1 1.722z"/>
        </svg>
        <input type="password" id="password" name="password" class="w-full py-2 pl-12 bg-gray-200 md:py-4 focus:outline-none" placeholder="Password" required />
      </div>
      @if($errors->has('login'))
        <div class="flex items-center mb-2 text-lg text-red-700 md:mb-4">
          <span>{{$errors->first('login')}}</span>
        </div>
      @endif
      <button type="submit" class="w-full p-2 font-medium text-white uppercase bg-gradient-to-b from-gray-700 to-gray-900 md:p-4">Login</button>
    </form>
  </div>
 </div>

</body>
</html>