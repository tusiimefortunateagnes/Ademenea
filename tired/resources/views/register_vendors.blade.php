@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>register-vendor</title>
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/home.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>

        <link href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
       <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>

    </head>
    <body>
   
   @include('navbar')
   @include('sidebar')


<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border rounded-lg light:border-gray-700">

<div style="
margin-left:10%;
margin-right:10%;
">
   <div class="relative overflow-x-auto">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl light:text-white">
                  Register New Vendor
              </h1>
              <form method="post"  class="space-y-4 md:space-y-6" action="registervendor">

               @csrf

                  <div>
                      <label for="Category" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Name</label>
                      <input type="text" name="name" placeholder="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" required="true">
                  </div>
                  <div>
                      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Email</label>
                      <input type="email" name="email"placeholder="emai" id="description"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" required="true">
                  </div>
                   <div>
                      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Phone</label>
                      <input type="text" name="phone" placeholder="phone" id="description"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" required="true">
                  </div>
                    <div>
                      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Website</label>
                      <input type="text" name="website" placeholder="website" id="description"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" required="true">
                  </div>
                   <div>
                      <label for="description" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Location</label>
                      <input type="text" name="location" placeholder="location" id="description"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" required="true">
                  </div>
 
                <button class="bg-green-500 text-white font-bold py-2 px-4 rounded-full w-full">
                      Register
                 </button>

              </form>
          </div>
    </div>
    </div>
  
   </div> 
</div>

<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>
</html>