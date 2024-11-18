<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Galery Desa Bukian</title>
  <link rel="icon" href="{{ asset('assets/image/favico/favicon.ico') }}" type="image/x-icon">
  @vite('resources/css/app.css')
  @vite('resources/js/app.js')
  {{-- <script src="./node_modules/preline/dist/preline.js"></script> --}}
</head>
<body>
@include('partials.header')
<div class="container max-w-[85rem] px-4 w-full mx-auto flex flex-wrap basis-full items-center justify-between">
  <div class="mt-[100px]">
    <ol class="flex items-center whitespace-nowrap">
        <li class="inline-flex items-center">
          <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600" href="#">
            Home
          </a>
          <svg class="shrink-0 mx-2 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <path d="m9 18 6-6-6-6"></path>
          </svg>
        </li>
        <li class="inline-flex items-center">
          <a class="flex items-center text-bold text-gray-900 hover:text-blue-600 focus:outline-none focus:text-blue-600" href="#">
            Galery
          </a>
        </li>
      </ol>
  </div>
</div>

<div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto mb-[100px]">
  <!-- Image Grid -->
<div class="grid grid-cols-2 sm:grid-cols-3 gap-2">
   <a class="group block relative overflow-hidden rounded-lg" href="#">
     <img class="w-full size-40 object-cover bg-gray-100 rounded-lg" src="https://images.unsplash.com/photo-1656618724305-a4257e46e847?q=80&w=320&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Project">
     <div class="absolute bottom-1 end-1 opacity-0 group-hover:opacity-100 transition">
       <div class="flex items-center gap-x-1 py-1 px-2 bg-white border border-gray-200 text-gray-800 rounded-lg">
         <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
         <span class="text-xs">View</span>
       </div>
     </div>
   </a>
 
   <a class="group block relative overflow-hidden rounded-lg" href="#">
     <img class="w-full size-40 object-cover bg-gray-100 rounded-lg" src="https://images.unsplash.com/photo-1616427592793-67b858804534?q=80&w=320&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Project">
     <div class="absolute bottom-1 end-1 opacity-0 group-hover:opacity-100 transition">
       <div class="flex items-center gap-x-1 py-1 px-2 bg-white border border-gray-200 text-gray-800 rounded-lg">
         <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
         <span class="text-xs">View</span>
       </div>
     </div>
   </a>
 
   <a class="group block relative overflow-hidden rounded-lg" href="#">
     <img class="w-full size-40 object-cover bg-gray-100 rounded-lg" src="https://images.unsplash.com/photo-1516131206008-dd041a9764fd?q=80&w=320&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Project">
     <div class="absolute bottom-1 end-1 opacity-0 group-hover:opacity-100 transition">
       <div class="flex items-center gap-x-1 py-1 px-2 bg-white border border-gray-200 text-gray-800 rounded-lg">
         <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
         <span class="text-xs">View</span>
       </div>
     </div>
   </a>
 
   <a class="group block relative overflow-hidden rounded-lg" href="#">
     <img class="w-full size-40 object-cover bg-gray-100 rounded-lg" src="https://images.unsplash.com/photo-1707760696486-2a2cd7e0b6a6?q=80&w=320&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Project">
     <div class="absolute bottom-1 end-1 opacity-0 group-hover:opacity-100 transition">
       <div class="flex items-center gap-x-1 py-1 px-2 bg-white border border-gray-200 text-gray-800 rounded-lg">
         <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
         <span class="text-xs">View</span>
       </div>
     </div>
   </a>
 
   <a class="group block relative overflow-hidden rounded-lg" href="#">
     <img class="w-full size-40 object-cover bg-gray-100 rounded-lg" src="https://images.unsplash.com/photo-1585159812596-fac104f2f069?q=80&w=320&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Project">
     <div class="absolute bottom-1 end-1 opacity-0 group-hover:opacity-100 transition">
       <div class="flex items-center gap-x-1 py-1 px-2 bg-white border border-gray-200 text-gray-800 rounded-lg">
         <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
         <span class="text-xs">View</span>
       </div>
     </div>
   </a>
 
   <a class="group block relative overflow-hidden rounded-lg" href="#">
     <img class="w-full size-40 object-cover bg-gray-100 rounded-lg" src="https://images.unsplash.com/photo-1654131300276-db70adf4f85d?q=80&w=320&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Project">
     <div class="absolute bottom-1 end-1 opacity-0 group-hover:opacity-100 transition">
       <div class="flex items-center gap-x-1 py-1 px-2 bg-white border border-gray-200 text-gray-800 rounded-lg">
         <svg class="shrink-0 size-3" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="11" cy="11" r="8"/><path d="m21 21-4.3-4.3"/></svg>
         <span class="text-xs">View</span>
       </div>
     </div>
   </a>
 </div>
 <!-- End Image Grid -->
 </div>
@include('partials.footer3')
</body>
</html>