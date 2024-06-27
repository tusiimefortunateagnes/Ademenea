@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>users</title>
     <link rel="stylesheet" href="//cdn.datatables.net/1.13.4/css/jquery.dataTables.min.css" >
    <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">
    </head>
    <body>
   
   @include('navbar')
   @include('sidebar')

   <div class="p-4 sm:ml-64">
   <div class="p-4 border-2 border-gray-200 border rounded-lg light:border-gray-700">

<center>
      {{-- displaying an alert after registering a category --}}
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

<button type="button" id="top" class="text-white bg-green-700 hover:bg-green-800 focus:outline-none focus:ring-4 focus:ring-green-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">
<a href="/register_user">Add New User</a>
</button>

</center>
<br>
<hr>
<br>
<div style="
margin-left:10%;
margin-right:10%;
">

<h5><b>USERS</b></h5>
<br>
<div class="relative overflow-x-auto">

    <table id="myable" class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">

         <tr>
             <th scope="col" class="px-6 py-3">
                    ID
                </th>

                <th scope="col" class="px-6 py-3">
                   Name
                </th>
               
                {{-- <th scope="col" class="px-6 py-3">
                    Last Name
                </th> --}}

                <th scope="col" class="px-6 py-3">
                   Contacts
                </th>

                {{-- <th scope="col" class="px-6 py-3">
                    Status
                </th> --}}

                <th scope="col" class="px-6 py-3">
                   Edit
                </th>

                <th scope="col" class="px-6 py-3">
                    Delete
                </th>

                <th scope="col" class="px-6 py-3">
                    Lend
                </th>
                
            </tr>
        </thead>
        <tbody>

         @foreach ($users as $user )

            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">

                <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $user->user_id }}
                </td>
          
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $user->firstname }} {{ $user->lastname }}
                </th>
     
                {{-- <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $user->lastname }}
                </td> --}}

                 <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $user->email }} <br> {{ $user->phone }}
                </td>
                
                 {{-- <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $user->status }}
                </td> --}}

                {{-- actions on users begin here --}}

                 {{-- first action to edit user --}}
                  <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                      
                       <a href="/edit_user_form? id={{ $user->user_id}}&firstname={{ $user->firstname }}&lastname={{ $user->lastname}}&email={{ $user->email}}&phone={{ $user->phone}}"> 
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10" />
                        </svg>
                         </a> 
                   </td>

         {{-- second action to deactivate user--}}
                {{-- <td scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <a href="/activate_deactivate? id={{ $user->id}}&status={{ $user->status }}">
                @if ($user->status =='active')
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                      <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                    </svg>
                @elseif ($user->status=='inactive') 
                     <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                       <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 10.5V6.75a4.5 4.5 0 119 0v3.75M3.75 21.75h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H3.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z" />
                     </svg>
                @endif
                        </a>
                </td> --}}

         {{--third action to delete user--}}
                   <td scope="row" class="px-6 py-4 font-medium text-red-900 whitespace-nowrap">
                            <svg xmlns="http://www.w3.org/2000/svg" onclick="prompt_user_delete()" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                            </svg>
                    </td>


         {{-- fourth action to add user to cart--}}
                <td scope="row">
                    <form method="post" action="user_cart">
                    @csrf
                          <input type="hidden" name="user" value="{{ $user->user_id}}">
                            <button class="text-white bg-orange-700 hover:bg-orange-800 focus:outline-none focus:ring-4 focus:ring-orange-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:bg-orange-600 dark:hover:bg-green-700 dark:focus:ring-orange-800">
                            Lend Items
                            </button>
                    </form>
                </td>

           </tr>
        @endforeach
        </tbody>
    </table>
</div>

</div>
</div>

@if (isset($user))
      <script>
      function prompt_user_delete(){

        let result = window.confirm("Are you sure you want to delete this user?");

        if (result) {
        // user clicked "OK"
        
        //piece of code missing here for sending user id for deletion.
          window.location.href = "/deleteuser? id={{ $user->user_id}}";

        } else {

        // user clicked "Cancel"
          alert("Operation Canceled.");
        }
      }

      </script>
 @endif

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script  type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.16/js/jquery.dataTables.js"></script>
<script>
 // let table = new DataTable('#myTable');
   $(document).ready(function(){
    $('#myable').DataTable();
   });
</script>
<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
    </body>
</html>
