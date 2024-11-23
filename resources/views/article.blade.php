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
                        href="{{ route('artikel') }}">
                        Arikel
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
                    <h2 class="text-2xl font-bold md:text-3xl text-center"> {{ $article->title }}</h2>
                </div>
                <div class="flex items-center ">
                    <p class="text-xs sm:text-sm text-gray-800">{{ $article->created_at->diffForHumans() }}</p>
                </div>


                <figure>
                    <img class="w-full object-cover rounded-xl"
                        src="{{ asset('assets/image/posts/' . $article->image_url) }}" alt="Blog Image">
                    <figcaption class="mt-3 text-sm text-center text-gray-500">
                        {{ ucwords(str_replace('_', ' ', pathinfo($article->image_url, PATHINFO_FILENAME))) }}
                    </figcaption>
                </figure>
                <div class="artikel-content">
                    {!! $cleanedContent !!}
                </div>


            </div>
            <!-- End Content -->
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menambahkan kelas pada elemen <p>
            const paragraphs = document.querySelectorAll('.artikel-content  p');
            paragraphs.forEach(function(paragraph) {
                paragraph.classList.add('text-lg', 'text-justify', 'text-gray-800', 'mt-2');
            });

            // Menambahkan kelas pada elemen <h1>
    const headings1 = document.querySelectorAll('.artikel-content h1');
    headings1.forEach(function(heading1) {
        heading1.classList.add('font-bold', 'text-justify', 'text-gray-800', 'text-lg', 'my-2');
    });

    // Menambahkan kelas pada elemen <h2>
    const headings2 = document.querySelectorAll('.artikel-content h2');
    headings2.forEach(function(heading2) {
        heading2.classList.add('font-bold', 'text-justify', 'text-gray-800', 'text-lg', 'my-2');
    });

    // Menambahkan kelas pada elemen <h3>
    const headings3 = document.querySelectorAll('.artikel-content h3');
    headings3.forEach(function(heading3) {
        heading3.classList.add('font-bold', 'text-justify', 'text-gray-800', 'text-lg', 'my-2');
    });

            // Menangani <ol> dengan data-list="bullet" dan mengubahnya menjadi <ul>
            const ols = document.querySelectorAll('.artikel-content ol');
            ols.forEach(function(ol) {
                // Cek apakah ol memiliki data-list="bullet", jika iya, ganti menjadi <ul>
                if (ol.querySelector('li[data-list="bullet"]')) {
                    // Membuat elemen <ul> baru
                    const ul = document.createElement('ul');

                    // Menyalin semua anak <li> dari <ol> ke <ul>
                    while (ol.firstChild) {
                        ul.appendChild(ol.firstChild);
                    }

                    // Menambahkan kelas yang sesuai pada <ul>
                    ul.classList.add('list-disc', 'ml-6'); // Gunakan list-disc untuk bullet

                    // Ganti <ol> dengan <ul> di DOM
                    ol.replaceWith(ul);
                } else {
                    // Untuk <ol> yang hanya berisi angka (list-decimal)
                    ol.classList.add('list-decimal', 'ml-6');
                }
            });

            // Menambahkan kelas pada elemen <li>
            const lis = document.querySelectorAll('.artikel-content  li');
            lis.forEach(function(li) {
                li.classList.add('ml-4'); // Memberikan margin kiri pada elemen <li>
            });

            // Menambahkan kelas pada elemen <span>
            const spans = document.querySelectorAll('.artikel-content  span');
            spans.forEach(function(span) {
                span.classList.add('ql-ui'); // Menambahkan kelas ql-ui pada elemen <span>
            });
        });
    </script>
    <!-- End Blog Article -->
    @include('partials.footer')
</body>
