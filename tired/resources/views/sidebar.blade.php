
@include('securitycheck')

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <title>dashboard</title>
        <link rel="stylesheet" href="https://unpkg.com/tailwindcss@2.1.4/dist/tailwind.min.css">
        <link rel="stylesheet" type="text/css" href="{{ asset('styles/home.css') }}">
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body>

<div style="
a:hover{
   text-decoration: underline;
   text-decoration-color: red;
}
">
<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm white-500 rounded-lg md:hidden  focus:outline-none focus:ring-2 focus:ring-gray-200 dark:white-400  dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>

<aside id="separator-sidebar" class=" text-white bg-green-700 fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0 text-white bg-green-700">
   <div class="h-full px-3 py-4 overflow-y-autotext-white bg-green-700">
      <ul class="space-y-2">

         <li>
            <a href="/users" class="hover:underline flex items-center p-2 text-base font-normal white-900 rounded-lg dark:text-white  ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 white-500 transition duration-75 dark:white-400 group-hover:black-900 dark:group-hover:text-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Users</span>
            </a>
         </li>


          <li>
            <a href="/consignments" class="hover:underline flex items-center p-2 text-base font-normal white-900 dark:text-white transition duration-75 rounded-lg   group">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75" />
               </svg>
               <span class="ml-3">Consignments</span>
            </a>
         </li>

         <li>
            <a href="/compartments" class="hover:underline flex items-center p-2 text-base font-normal white-900 dark:text-white transition duration-75 rounded-lg   group">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
            <path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0l-3-3m3 3l3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" />
            </svg>
               <span class="ml-3">Compartments</span>
            </a>
         </li>

          <li>
            <a href="/category" class="hover:underline flex items-center p-2 text-base font-normal white-900 dark:text-white transition duration-75 rounded-lg   group">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 white-500 transition duration-75 dark:white-400 group-hover:black-900 dark:group-hover:text-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"></path></svg>
               <span class="ml-3">Categories</span>
            </a>
         </li>

         <li>
            <a href="/items" class="hover:underline flex items-center p-2 text-base font-normal white-900 rounded-lg dark:text-white  ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 white-500 transition duration-75 dark:white-400 group-hover:black-900 dark:group-hover:text-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M10 2a4 4 0 00-4 4v1H5a1 1 0 00-.994.89l-1 9A1 1 0 004 18h12a1 1 0 00.994-1.11l-1-9A1 1 0 0015 7h-1V6a4 4 0 00-4-4zm2 5V6a2 2 0 10-4 0v1h4zm-6 3a1 1 0 112 0 1 1 0 01-2 0zm7-1a1 1 0 100 2 1 1 0 000-2z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Lab Items</span>
            </a>
         </li>

         <li>
            <a href="/borrows" class="hover:underline flex items-center p-2 text-base font-normal white-900 rounded-lg dark:text-white  ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 white-500 transition duration-75 dark:white-400 group-hover:black-900 dark:group-hover:text-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Borrowing</span>
            </a>
         </li>
         
         <li>
            <a href="/orders" class="hover:underline flex items-center p-2 text-base font-normal white-900 rounded-lg dark:text-white  ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 white-500 transition duration-75 dark:white-400 group-hover:black-900 dark:group-hover:text-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z" clip-rule="evenodd"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Orders</span>
            </a>
         </li>

         <li>
            <a href="/dashboard" class="hover:underline flex items-center p-2 text-base font-normal white-900 dark:text-white rounded-lg  ">
               <svg aria-hidden="true" class="w-6 h-6 white-500 transition duration-75 dark:white-400 group-hover:black-900 dark:group-hover:text-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path><path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path></svg>
               <span class="ml-3">Reports</span>
            </a>
         </li>

          <li>
            <a href="/vendors" class="hover:underline flex items-center p-2 text-base font-normal white-900 transition duration-75 rounded-lg   dark:text-white group">
               <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
               <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 21v-7.5a.75.75 0 01.75-.75h3a.75.75 0 01.75.75V21m-4.5 0H2.36m11.14 0H18m0 0h3.64m-1.39 0V9.349m-16.5 11.65V9.35m0 0a3.001 3.001 0 003.75-.615A2.993 2.993 0 009.75 9.75c.896 0 1.7-.393 2.25-1.016a2.993 2.993 0 002.25 1.016c.896 0 1.7-.393 2.25-1.016a3.001 3.001 0 003.75.614m-16.5 0a3.004 3.004 0 01-.621-4.72L4.318 3.44A1.5 1.5 0 015.378 3h13.243a1.5 1.5 0 011.06.44l1.19 1.189a3 3 0 01-.621 4.72m-13.5 8.65h3.75a.75.75 0 00.75-.75V13.5a.75.75 0 00-.75-.75H6.75a.75.75 0 00-.75.75v3.75c0 .415.336.75.75.75z" />
               </svg>
               <span class="ml-3">Vendors</span>
            </a>
         </li>

         <li>
            <a href="/logmeout" class="hover:underline flex items-center p-2 text-base font-normal white-900 rounded-lg dark:text-white  ">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 white-500 transition duration-75 dark:white-400 group-hover:black-900 dark:group-hover:text-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z"></path><path d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z"></path></svg>
               <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
            </a>
         </li>

      </ul>
      <ul class="pt-4 mt-4 space-y-2 border-t border-gray-200 dark:border-gray-700">
         <li>
            <a href="#" class="hover:underline flex items-center p-2 text-base font-normal white-900 transition duration-75 rounded-lg   dark:text-white group">
               <svg aria-hidden="true" class="flex-shrink-0 w-6 h-6 white-500 transition duration-75 dark:white-400 group-hover:black-900 dark:group-hover:text-dark" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-2 0c0 .993-.241 1.929-.668 2.754l-1.524-1.525a3.997 3.997 0 00.078-2.183l1.562-1.562C15.802 8.249 16 9.1 16 10zm-5.165 3.913l1.58 1.58A5.98 5.98 0 0110 16a5.976 5.976 0 01-2.516-.552l1.562-1.562a4.006 4.006 0 001.789.027zm-4.677-2.796a4.002 4.002 0 01-.041-2.08l-.08.08-1.53-1.533A5.98 5.98 0 004 10c0 .954.223 1.856.619 2.657l1.54-1.54zm1.088-6.45A5.974 5.974 0 0110 4c.954 0 1.856.223 2.657.619l-1.54 1.54a4.002 4.002 0 00-2.346.033L7.246 4.668zM12 10a2 2 0 11-4 0 2 2 0 014 0z" clip-rule="evenodd"></path></svg>
               <span class="ml-3">Help</span>
            </a>
         </li>
      </ul>
   </div>
</aside>
<div>

<script src="https://unpkg.com/flowbite@1.4.7/dist/flowbite.js"></script>
</body>
</html>