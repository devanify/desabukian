<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Artikel Desa Bukian</title>
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
                    <a class="flex items-center text-sm text-gray-500 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                        href="{{ route('home') }}">
                        Home
                    </a>
                    <svg class="shrink-0 mx-2 size-4 text-gray-400" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m9 18 6-6-6-6"></path>
                    </svg>
                </li>
                <li class="inline-flex items-center">
                    <a class="flex items-center text-bold text-gray-900 hover:text-blue-600 focus:outline-none focus:text-blue-600"
                        href="#">
                        Artikel
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <!-- Card Blog -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto mb-[100px]">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight">Artikel Desa Bukian</h2>
            <p class="mt-1 text-gray-600">Temukan tulisan menarik dari desa bukian.</p>
            <!-- Dropdown Filter Tahun -->
            <div class="hs-dropdown relative inline-flex mt-3">
                <button id="hs-dropdown-with-icons" type="button"
                    class="hs-dropdown-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50"
                    aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                    Pilih Tahun
                    <svg class="hs-dropdown-open:rotate-180 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                        height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6" />
                    </svg>
                </button>
    
                <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden min-w-60 bg-white shadow-md rounded-lg mt-2 divide-y divide-gray-200"
                    role="menu" aria-orientation="vertical" aria-labelledby="hs-dropdown-with-icons">
                    <div class="p-1 space-y-0.5">
                        @foreach ($years as $year)
                            <a href="{{ route('artikel', ['year' => $year]) }}"
                                class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                {{ $year }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End Dropdown Filter Tahun -->
        </div>
        <!-- End Title -->

        <!-- Grid -->
        <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($post as $p)
                <!-- Card -->
                <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5"
                    href="{{ route('article', $p->slug) }}">
                    <div class="aspect-w-16 aspect-h-11">
                        <img class="w-full object-cover rounded-xl"
                            src="{{ asset('assets/image/posts/' . $p->image_url) }}" alt="Blog Image">
                    </div>
                    <div class="my-6">
                        <h3 class="text-xl font-semibold text-gray-800">
                            {{ $p->title }}
                        </h3>
                        <p class="mt-5 text-gray-600">
                            {{ substr(strip_tags($p->content), 0, 50) }}...
                        </p>
                    </div>
                    <div class="mt-auto flex items-center gap-x-3">
                        <img class="size-8" src="{{ asset('assets/image/bukian.png') }}" alt="Avatar">
                        <div>
                            <h5 class="text-sm text-gray-800">{{ $p->created_at->diffForHumans() }}</h5>
                        </div>
                    </div>
                </a>
                <!-- End Card -->
            @endforeach


            <!-- Card -->
            {{-- <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5" href="{{ route('article') }}">
        <div class="aspect-w-16 aspect-h-11">
          <img class="w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1562851529-c370841f6536?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
        </div>
        <div class="my-6">
          <h3 class="text-xl font-semibold text-gray-800">
            How Google Assistant now helps you record stories for kids
          </h3>
          <p class="mt-5 text-gray-600">
            Google is constantly updating its consumer AI, Google Assistant, with new features.
          </p>
        </div>
        <div class="mt-auto flex items-center gap-x-3">
          <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
          <div>
            <h5 class="text-sm text-gray-800">By Aaron Larsson</h5>
          </div>
        </div>
      </a> --}}
            <!-- End Card -->

            <!-- Card -->
            {{-- <a class="group flex flex-col h-full border border-gray-200 hover:border-transparent hover:shadow-lg focus:outline-none focus:border-transparent focus:shadow-lg transition duration-300 rounded-xl p-5" href="{{ route('article') }}">
        <div class="aspect-w-16 aspect-h-11">
          <img class="w-full object-cover rounded-xl" src="https://images.unsplash.com/photo-1521321205814-9d673c65c167?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=560&q=80" alt="Blog Image">
        </div>
        <div class="my-6">
          <h3 class="text-xl font-semibold text-gray-800">
            Front accounts - let's work together
          </h3>
          <p class="mt-5 text-gray-600">
            Are you an accountant? Are you a company formation advisor?
          </p>
        </div>
        <div class="mt-auto flex items-center gap-x-3">
          <img class="size-8 rounded-full" src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=facearea&facepad=2&w=320&h=320&q=80" alt="Avatar">
          <div>
            <h5 class="text-sm text-gray-800">By Lauren Waller</h5>
          </div>
        </div>
      </a> --}}
            <!-- End Card -->
        </div>
        <!-- End Grid -->

        <div class="mt-6">
            {{ $post->links() }} <!-- Pagination links -->
        </div>
    </div>
    <!-- End Card Blog -->
    @include('partials.footer')
</body>
