@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>register-item</title>
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
                  Register New Item
              </h1>
              <form class="space-y-4 md:space-y-6" action="registeritem" method="post" id="form">

               @csrf
                  <div>
                      <label for="item name" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Item name</label>
                      <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="item name" required="true">
                  </div>

                   <div>
                      <label for="item name" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Serial number</label>
                      <input type="text" name="serialNo" placeholder="Serial number if any.. please leave blank if not applicable." class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500">
                  </div>

                  <div>
                      <label for="cost" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">type</label>
                      <input type="text" name="type" id="type" placeholder="enter item  type" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" required="true">
                  </div>

                  {{-- category choosing --}}
                    
                  <label for="categories" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select A Category</label>
                    <select name="category" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                       {{-- we will use a loop from the database here --}}
                    @foreach ($categories as $categories )  
                     <option value= "{{ $categories->category_id }}"> {{ $categories->category_name }} </option>
                    @endforeach
                    </select>

                     {{-- consignment choosing --}}
                    
                  <label for="consignment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select A Receipt Number</label>
                    <select name="consignment" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                       {{-- we will use a loop from the database here --}}
                    @foreach ($consignments as $consignment )  
                     <option value= "{{ $consignment->consignment_id }}"> {{ $consignment->receiptNo }} </option>
                    @endforeach
                    </select>

                     {{-- compartment choosing --}}
                    
                  <label for="compartment" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select A Comaprtment</label>
                    <select name="compartment" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                       {{-- we will use a loop from the database here --}}
                    @foreach ($compartments as $compartment )  
                     <option value= "{{ $compartment->compartment_id }}"> {{ $compartment->number }} </option>
                    @endforeach
                    </select>

                <div>
                      <label for="quantity" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Quantity</label>
                      <input type="text" name="quantity" id="cost" placeholder="enter number" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" required="true">
                  </div>

                  <div class="flex items-center justify-between">
                      <div class="flex items-start">
                      </div>
                  </div>

                  <button class="bg-green-500 text-white font-bold py-2 px-4 rounded-full w-full">
                              Submit
                  </button>
                  <p class="text-sm font-light text-gray-500 light:text-gray-400">
                {{-- <a href="/" class="font-medium text-primary-600 hover:underline light:text-primary-500">Homepage</a> --}}
                  </p>
              </form>
          </div>
    </div>
  
   </div> 
</div>

<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>
</html>