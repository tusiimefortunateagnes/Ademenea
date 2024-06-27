@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>return-items</title>
    <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">
    </head>
    <body>
   
   @include('navbar')
   @include('sidebar')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border rounded-lg dark:border-gray-700">
  
<br>
    <h5><b>Returned Items</b></h5>
<hr>
<br>
<div style="
margin-left:10%;
margin-right:10%;
">

<form method="POST" action="returnItems">
    @csrf


    <table>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead>
        <tr>
            <th>Item Name</th>
            <th>Item Quantity</th>
            <th>Returned</th>
            <th>Condition</th>
        </tr>
    </thead>
    <tbody>
   
         @foreach($items as $item)
            <tr>
                <td>{{ $item->name }}</td>
                <td>1</td>
                <td><input type="checkbox" name="returned[]" value="{{ $item->SerialNo }}"></td>
                <td>
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Faulty?</a>
                </td>
{{-- since these products are on the same order, lets pick the order id for order handling --}}
    <input type="hidden" name="order" value="{{ $item->borrow_id }}">
            </tr>
        @endforeach

        @foreach($results as $result)
            <tr>
                <td>{{ $result->name }}</td>
                <td>{{ $result->quantity }}</td>
                <td><input type="checkbox" name="returned[]" value="{{ $result->item_id }}"></td>
                <td>
                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Faulty?</a>
                </td>
{{-- since these products are on the same order, lets pick the order id for order handling --}}
    <input type="hidden" name="order" value="{{ $result->borrow_id }}">
            </tr>
        @endforeach

    </tbody>
  </table>
  <br>
  <div style="float:right;">
  <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
      Mark Returned
  </button>
  </div>
</form>
<br><br><br>
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