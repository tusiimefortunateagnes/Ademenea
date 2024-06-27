
@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>vendors</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">
    </head>
    <body>
   
   @include('navbar')
   @include('sidebar')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border rounded-lg light:border-gray-700">

<center>
      {{-- displaying an alert after registering a vendor --}}
         @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <b> {{ session('success') }}</b>
            </div> 

        @elseif (session('updated')) 
             <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <b> {{ session('updated') }}</b>
              </div>
            @endif
{{-- start of the page content --}}


<button type="button" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
<a href="register_vendors">Add New Vendor</a>
</button>

</center>
<br>
<hr>
<br>
<div style="
margin-left:10%;
margin-right:10%;
">

<h5><b>Registered Vendors</b></h5>
<br>
<div class="relative overflow-x-auto shadow-md sm:rounded-lg">

    <table id="myTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

             <th scope="col" class="px-6 py-3">
                    ID
                </th>

                <th scope="col" class="px-6 py-3">
                    Vendor name
                </th>
               
                <th scope="col" class="px-6 py-3">
                    Email
                </th>

                <th scope="col" class="px-6 py-3">
                    Phone
                </th>

                <th scope="col" class="px-6 py-3">
                    Location
                </th>

                <th scope="col" class="px-6 py-3">
                   Website
                </th>
                
                <th scope="col" class="px-6 py-3">
                  Edit
                </th>
            </tr>
        </thead>
        <tbody>

        @foreach ($vendors as $vendor )

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $vendor->vendor_id }}
                </td>
          
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                   {{ $vendor->name }}
                </td>
     
                <td scope="row" class="px-6 py-4">
                   {{ $vendor->email}}
                </td>
           
                <td scope="row" class="px-6 py-4">
                   {{ $vendor->phone}}
                </td>

                <td scope="row" class="px-6 py-4">
                   {{ $vendor->location}}
                </td>

                <td scope="row" class="px-6 py-4">
                <a href="{{ $vendor->website}}">
                   {{ $vendor->website}}
                </a>
                </td>

                  {{-- edit begins here --}}
                 
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">

                       <a href="/edit_vendor_form? id={{ $vendor->id}}&name={{ $vendor->name }}&email={{ $vendor->email}}&phone={{ $vendor->phone}}&website={{ $vendor->website}}&location={{ $vendor->location}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">
                         Edit
                       </a>
                </td>
           </tr>
        @endforeach
        </tbody>
    </table>
</div>
   </div> 
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script  type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script>
 // let table = new DataTable('#myTable');
   $(document).ready(function(){
    $('#myTable').DataTable();
   });
</script>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    </body>
</html>
