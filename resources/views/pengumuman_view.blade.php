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
                        href="{{ route('pengumuman') }}">
                        Pengumuman
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
                    <h2 class="text-2xl font-bold md:text-3xl text-center"> {{ $pengumuman->judul }}</h2>
                </div>
                <!-- Cek apakah media adalah PDF atau gambar -->
                @php
                    $extension = pathinfo($pengumuman->media, PATHINFO_EXTENSION);
                @endphp

                <!-- Jika media adalah PDF, tampilkan PDF -->
                @if ($extension === 'pdf')
                    <figure>
                        <iframe src="{{ asset('assets/image/pengumuman/' . $pengumuman->media) }}"
                            style="width: 100%; height: 500px; border: none;">
                        </iframe>
                    </figure>
                @else
                    <!-- Jika media bukan PDF (misalnya gambar), tampilkan gambar -->
                    <figure>
                        <img class="w-full object-cover"
                            src="{{ asset('assets/image/pengumuman/' . $pengumuman->media) }}" alt="Pengumuman">
                    </figure>
                @endif
                <div class="pengumuman-content">
                    {!! $pengumuman->keterangan !!}
                </div>

            </div>
            <!-- End Content -->
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Menambahkan kelas pada elemen <p>
            const paragraphs = document.querySelectorAll('.pengumuman-content p');
            paragraphs.forEach(function(paragraph) {
                paragraph.classList.add('text-lg', 'text-justify', 'text-gray-800', 'mt-2');
            });

            // Menangani <ol> dengan data-list="bullet" dan mengubahnya menjadi <ul>
            const ols = document.querySelectorAll('.pengumuman-content ol');
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
            const lis = document.querySelectorAll('.pengumuman-content li');
            lis.forEach(function(li) {
                li.classList.add('ml-4'); // Memberikan margin kiri pada elemen <li>
            });

            // Menambahkan kelas pada elemen <span>
            const spans = document.querySelectorAll('.pengumuman-content span');
            spans.forEach(function(span) {
                span.classList.add('ql-ui'); // Menambahkan kelas ql-ui pada elemen <span>
            });
        });
    </script>
    <!-- End Blog Article -->
    @include('partials.footer')
</body>
