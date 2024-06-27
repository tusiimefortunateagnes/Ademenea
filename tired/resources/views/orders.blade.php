
@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>orders</title>
     <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">

    </head>
    <body>
   
   @include('navbar')
   @include('sidebar')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border rounded-lg dark:border-gray-700">
   {{-- side items  --}}

     <center>
   {{-- displaying an alert after registering an item --}}
         @if (session('success'))
            <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <b> {{ session('success') }}</b>
            </div>

        @elseif (session('updated')) 
             <div class="p-4 mb-4 text-sm text-green-800 rounded-lg bg-green-50 dark:bg-gray-800 dark:text-green-400" role="alert">
            <b> {{ session('updated') }}</b>
              </div> 
        @endif

</center>
<br>
<hr>
<br>
<div style="
margin-left:1%;
margin-right:1%;
">

<h5><b>Orders</b></h5>
<br>
<div class="relative overflow-x-auto">

   <table id="myTable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>

               <th scope="col" class="searchable">
                    ID
                </th>

                <th scope="col" class="searchable">
                    Borrower
                </th>

                <th scope="col" class="searchable">
                    Borrow Date
                </th>
                
                <th scope="col" class="searchable">
                    Reason
                </th>

                <th  scope="col" class="px-6 py-3">
                   items
                </th>

                <th  scope="col" class="px-6 py-3">
                    Status
                </th>

                <th scope="col" class="px-6 py-3">
                    Action
                </th>
                
            </tr>
        </thead>
        <tbody>

        @foreach ($orders as $order )

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->borrow_id }}
                </th>
          
     
                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->fullname }} 
                </td>

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->borrowDate }}
                </td>

                 <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->reason }}
                </td>
              

                 <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  @if(!empty($order->trackable_items))
                    @foreach (explode(',', $order->trackable_items) as $item)
                        <li>{{ $item }}</li>
                    @endforeach
                  @endif
                  @if(!empty($order->items))
                     @foreach (explode(',', $order->items) as $item)
                      <li>{{ $item }}</li>
                     @endforeach
                  @endif
                  </td>
 

                 <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $order->borrow_status }}
                </td>

                {{-- actions on users begin here --}}

                    {{-- action to complete order --}}
              <form method="post" action="returnOrder">
                   @csrf

              <input type="hidden" name="order" value="{{ $order->borrow_id }}">
                
                   <td scope="row">
                   <button class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-3 py-2 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                           Return
                   </button>
                    </td>
              </form>
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

<script>
//this script prompts with a confirmation dialog box before deleting a 

function prompt_user_delete(){

    let result = window.confirm("Are you sure you want to complete this order?");

  if (result) {
  // user clicked "OK"
  alert("order completed successfully!");
  
  //piece of code missing here for sending user id for deletion.


   } else {

  // user clicked "Cancel"
    alert("Operation Canceled.");
   }

}

</script>
 </body>
</html>