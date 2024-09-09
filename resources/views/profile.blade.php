@extends('layouts.dash')


@section('content')
    
<button data-drawer-target="cta-button-sidebar" data-drawer-toggle="cta-button-sidebar" aria-controls="cta-button-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-white-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 <aside id="cta-button-sidebar" class="fixed top-24 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-red-400 text-white dark:bg-gray-800 pt-6">
       <ul class="space-y-2 font-medium">
          <li>
             <a href="#" class="flex items-center p-2 text-white-900 rounded-lg hover:bg-gray-100 group hover:text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white-500 transition duration-75 group-hover:text-gray-500" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M15 9.429V5a2 2 0 0 0-2-2h-2a2 2 0 0 0-2 2v8.286m6-3.857V21m0-11.571h4a2 2 0 0 1 2 2V19a2 2 0 0 1-2 2h-4m0 0H9m0 0v-7.714M9 21H5a2 2 0 0 1-2-2v-3.714a2 2 0 0 1 2-2h4"/></svg>
                <span class="ms-3 font-semibold ">Dashboard</span>
             </a>
          </li>
          <li>
            <a href="#" class="flex items-center p-2 text-white-900 rounded-lg hover:bg-gray-100 group hover:text-gray-500">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white-500 transition duration-75 group-hover:text-gray-500" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><circle cx="12" cy="7.5" r="3"/><path d="M19.5 20.5c-.475-9.333-14.525-9.333-15 0"/></g></svg>
               <span class="ms-3 font-semibold ">Profile</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-white-900 rounded-lg hover:bg-gray-100 group hover:text-gray-500">
               <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white-500 transition duration-75 group-hover:text-gray-500" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="m11 10.242l1.034 1.181c.095.109.266.1.35-.016l2.1-2.907M16.5 21a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3m-8 0a1.5 1.5 0 1 0 0-3a1.5 1.5 0 0 0 0 3"/><path d="M3.71 5.4h15.214c1.378 0 2.373 1.27 1.995 2.548l-1.654 5.6C19.01 14.408 18.196 15 17.27 15H8.112c-.927 0-1.742-.593-1.996-1.452zm0 0L3 3"/></g></svg>
               <span class="ms-3 font-semibold ">Commandes</span>
            </a>
         </li>
         <li>
            <a href="#" class="flex items-center p-2 text-white-900 rounded-lg hover:bg-gray-100 group hover:text-gray-500">
               <svg class="w-5 h-5 text-white-500 transition duration-75 group-hover:text-gray-500" viewBox="0 0 24 24"><g fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"><path d="M12.56 20.82a.96.96 0 0 1-1.12 0C6.611 17.378 1.486 10.298 6.667 5.182A7.6 7.6 0 0 1 12 3c2 0 3.919.785 5.333 2.181c5.181 5.116.056 12.196-4.773 15.64"/><path d="M12 12a2 2 0 1 0 0-4a2 2 0 0 0 0 4"/></g></svg>
               <span class="ms-3 font-semibold ">Adresses</span>
            </a>
         </li>

         <li>
            <a href="#" class="flex items-center p-2 text-white-900 rounded-lg hover:bg-gray-100 group hover:text-gray-500">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white-500 transition duration-75 group-hover:text-gray-500" viewBox="0 0 24 24"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13.496 21H6.5c-1.105 0-2-1.151-2-2.571V5.57c0-1.419.895-2.57 2-2.57h7M16 15.5l3.5-3.5L16 8.5m-6.5 3.496h10"/></svg>
               <span class="ms-3 font-semibold ">Déconnexion</span>
            </a>
         </li>

       </ul>

    </div>
 </aside>
 
 <div class="p-4 mt-32 sm:ml-64">
    <div class="p-4 border-2 border-gray-200 border-dashed rounded-lg dark:border-gray-700">

    </div>
 </div>
 
@endsection