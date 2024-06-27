@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>add-consignment</title>
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
                  Register New Consignment
              </h1>
              <form class="space-y-4 md:space-y-6" action="registerorder" method="post" id="form" enctype="multipart/form-data">
         @csrf
                  <div>
                      <label for="username" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Receipt Number</label>
                      <input type="text" name="receiptNo" id="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="receipt number" required="true">
                  </div>

                  <label for="vendors" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Select A Vendor</label>
                    <select name="vendor" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-500 focus:border-green-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-green-500 dark:focus:border-green-500">
                       {{-- we will use a loop from the database here --}}
                    @foreach ($vendors as $vendors )  
                     <option value= "{{ $vendors->vendor_id }}"> {{ $vendors->name }} </option>
                    @endforeach
                    </select>

                  <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Bought</label>
                     <input type="date" name="dateBought" id="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="date bought" required="true">
                  </div>

                  <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Date Received</label>
                     <input type="date" name="dateReceived" id="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="date received" required="true">
                  </div>

                  <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">receipt image</label>
                     <input type="file" name="image" id="" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="date bought" required="true">
                  </div>
    
                  <button class="bg-green-500 text-white font-bold py-2 px-4 rounded-full w-full">
                              Submit
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