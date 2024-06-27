
@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>cart</title>
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/home.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>
   
   @include('navbar')
   @include('sidebar')

<div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border rounded-lg dark:border-gray-700">  

<div style="
margin-left:10%;
margin-right:10%;
">
<div class="grid grid-cols-2 gap-4">
    <div>
  {{-- first column --}} 
 {{-- cart icon notification to show how many items are in cart.    --}}
        @if(session()->has('cart') && !empty(session('cart')))
              <button type="button" class="relative inline-flex items-center p-3 text-sm font-medium text-center text-white bg-green-700 rounded-lg hover:bg-gray-800 focus:ring-4 focus:outline-none focus:ring-green-300 dark:bg-green-600 dark:hover:bg-gray-700 dark:focus:ring-green-800">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 3h1.386c.51 0 .955.343 1.087.835l.383 1.437M7.5 14.25a3 3 0 00-3 3h15.75m-12.75-3h11.218c1.121-2.3 2.1-4.684 2.924-7.138a60.114 60.114 0 00-16.536-1.84M7.5 14.25L5.106 5.272M6 20.25a.75.75 0 11-1.5 0 .75.75 0 011.5 0zm12.75 0a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
              </svg>
                <div class="absolute inline-flex items-center justify-center w-6 h-6 text-xs font-bold text-white bg-red-500 border-2 border-white rounded-full -top-2 -right-2 dark:border-gray-900">
              {{ count(session()->get('cart')) }}
                </div>
              </button>
         @endif

    </div>
    {{-- second column --}}
    <div>
 <h5><b>Being borrowed by {{  Session::get('username')  }}</b></h5>
    </div> {{-- closes second column --}} 
</div>  {{-- closes entire column wrap div --}}

<br>
<hr>
<br>

@if(session()->has('cart') && !empty(session('cart')))
 <h5><b>Borrowing Cart</b></h5>
@endif
 <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
    <thead>
        <tr>
            <th>Item ID</th>
            <th>Item Name</th>
            <th>Quantity</th>
            {{-- <th>User ID</th> --}}
            <th>Remove</th>
        </tr>
    </thead>
    <tbody>
    @if(session()->has('cart') && !empty(session('cart'))) 
        @foreach(session('cart') as $item)
            <tr>
                <td>{{ $item['id'] }}</td>
                <td>{{ $item['name'] }}</td>
                <td>{{ $item['quantity']}}</td>
                {{-- <td>{{ Session::get('user')}}</td> --}}
          
                {{--action to delete item from cart--}}
                  <td scope="row" class="px-6 py-4 font-medium text-red-900 whitespace-nowrap">

                    <form method="post" action = "deletefromcart">
                       @csrf
                       <input type="hidden" name="item" value="{{ $item['id'] }}">
                        <button type=submit>
                            <svg xmlns="http://www.w3.org/2000/svg" onclick="prompt_item_delete()" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                        </button>
                        </form>
                   </td>
            </tr>
        @endforeach
    </tbody>
  </table>
@endif

<hr><br>
<center>
<button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:outline-none focus:ring-4 focus:ring-blue-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
<a href="/borrows">Back</a>
</button>
</center>
<br>
<h5><b>Proceed and complete order</b></h5>
   
<form class="space-y-4 md:space-y-6" method ="post" action = "checkout"  enctype="multipart/form-data">
 @csrf

  @if(session()->has('cart') && !empty(session('cart'))) 
    @foreach(session('cart') as $item)
 {{-- getting an array of these cart items --}}
    <input type="hidden" name="products[ {{ $item['id'] }} ][id]" value="{{ $item['id'] }}">
    <input type="hidden" name="products[ {{ $item['id'] }} ][quantity]" value="{{ $item['quantity'] }}">
    <input type="hidden" name="products[ {{ $item['id'] }} ][user]" value="{{ Session::get('user') }}">
    @endforeach
  @endif
                  <div>
                      <label for="" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Expected Return Date</label>
                      <input type="date" name="returnDate" id="category" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="return date" required="true">
                  </div>

                  <div>
                    <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Reason For Borrowing</label>
                    <textarea name="reason"  rows="4" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Write borrowers reason here..." required></textarea>
                  </div>

                  <div>
                      <label for="" class="block mb-2 text-sm font-medium text-gray-900 light:text-white">Borrow Proof Image</label>
                      <input type="file" name="image" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 light:bg-gray-700 light:border-gray-600 light:placeholder-gray-400 light:text-white light:focus:ring-green-500 light:focus:border-green-500" placeholder="image" required="true">
                  </div>
               
                <button type="submit" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
                Checkout
                </button>
              </form>



   </div> 
</div>

<script>

function prompt_item_delete(){

    let result = window.confirm("Are you sure you want to remove this item?");

  if (result) {
  // user clicked "OK"
  //alert("item removed successfully!");
  
  //piece of code missing here for sending user id for deletion.
    window.location.href = "/deletefromcart? id={{ $item['id'] }}";

   } else {

  // user clicked "Cancel"
    alert("Operation Canceled.");
   }
}
</script>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    </body>
</html>
