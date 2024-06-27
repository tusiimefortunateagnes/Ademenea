@include('securitycheck')


{{-- we have to obtain the id of the user we want to edit here before submission --}}
{{--  <p>The user ID is: {{ $_GET['id'] }}  </p> --}}

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>edit-user</title>
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/home.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

      @include('navbar')

<br>
      <div class="flex items-center justify-center h-screen">

       <div class="w-full bg-white rounded-lg shadow dark:border md:mt-0 sm:max-w-md xl:p-0 dark:bg-gray-800 dark:border-gray-700">
          <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
              <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl dark:text-white">
                  Edit User
              </h1>
              <form method="post"  class="space-y-4 md:space-y-6" action="edituser">

               @csrf

                  <input type="hidden" name="id" value="{{ $_GET['id'] }}">
                  <div>
                      <label for="firstname" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">first name</label>
                      <input type="text" name="firstname" value="{{ $_GET['firstname']}}" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="firstname" required="true">
                  </div>
                   
                   <div>
                      <label for="lastname" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">last name</label>
                      <input type="text" name="lastname" value="{{ $_GET['lastname']}}"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="lastname" required="true">
                  </div>

                  <div>
                      <label for="email" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">email</label>
                      <input type="email" name="email" value="{{ $_GET['email']}}"  class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="email" required="true">
                  </div>

                  <div>
                      <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">phone number</label>
                      <input type="text" name="phone" value="{{ $_GET['phone']}}"  placeholder="tel No." class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" required="true">
                  </div>
                  <div class="grid grid-cols-2 gap-4">
                  
                          <div class="flex items-center h-5">
                            <a href="users" class="bg-red-500 text-white font-bold py-2 px-4 rounded-full w-full">
                              Cancel
                            </a>   
                          </div>

                          <div class="flex items-center h-5">
                            <button class="bg-green-500 text-white font-bold py-2 px-4 rounded-full w-full">
                              Save Changes
                            </button>
                          </div>

                      </div>
              </form>

              </div>
              </div>
    </div>
   


<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    </body>
</html>