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
                        href="{{ route('blog') }}">
                        Blog
                </a>
                    </svg>
                </li>
            </ol>
        </div>
    </div>
    <!-- Blog Article -->
    <div class="max-w-3xl px-4 pt-6 lg:pt-10 pb-12 sm:px-6 lg:px-8 mx-auto">

        <div class="max-w-2xl">
            <!-- Content -->
            <div class="space-y-5 md:space-y-8 mb-[100px]">
                <div class="space-y-3">
                    <h2 class="text-2xl font-bold md:text-3xl text-center"> {{ $article -> title }}</h2>
                </div>
                <div class="flex items-center ">
                    <p class="text-xs sm:text-sm text-gray-800">{{ $article->created_at->diffForHumans()}}</p>
                  </div>

                
                <figure>
                    <img class="w-full object-cover rounded-xl"
                    src="{{asset('assets/image/posts/'.$article->image_url) }}"
                    alt="Blog Image">
                    <figcaption class="mt-3 text-sm text-center text-gray-500">
                        {{ ucwords(str_replace('_', ' ', pathinfo($article->image_url, PATHINFO_FILENAME))) }}
                    </figcaption>
                </figure>
                
                {{-- <p class="text-lg text-justify indent-8 text-gray-800">{!! $article->content !!}</p> --}}
                <p class="text-lg text-justify indent-8 text-gray-800">{!! $cleanedContent !!}</p>

            
            </div>
            <!-- End Content -->
        </div>
    </div>
    <!-- End Blog Article -->
    @include('partials.footer')
</body>
