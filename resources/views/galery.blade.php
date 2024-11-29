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
                        Galery
                    </a>
                </li>
            </ol>
        </div>
    </div>
    <div class="max-w-[85rem] px-4 py-10 sm:py-5 sm:px-6 lg:px-8  mx-auto mb-[100px]">
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Galeri Kegiatan</h2>
            <p class="mt-1 text-gray-600">Informasi Kegiatan Terlaksana di Desa Bukian.</p>
            <!-- Form Filter Tahun -->
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
                            <a href="{{ route('gallery', ['year' => $year]) }}"
                                class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                                {{ $year }}
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- End Form Filter Tahun -->
        </div>
        
        {{-- Menampilkan data berdasarkan bulan dan tahun --}}
        @foreach ($groupedData as $monthYear => $items)
            <h3 class="text-xl font-semibold mb-5 mt-5">Kegiatan {{ $monthYear }}</h3>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                @foreach ($items as $item)
                    <div>
                        @php
                            // Tentukan path gambar berdasarkan model
                            $imagePath =
                                $item instanceof \App\Models\Galeri
                                    ? asset('assets/image/galeri/' . $item->image_url)
                                    : asset('assets/image/posts/' . $item->image_url);
                        @endphp
                        <img class="h-auto max-w-full rounded-lg" src="{{ $imagePath }}" alt="Gallery image" />
                        <figcaption class="mt-3 text-sm text-center text-gray-500">
                            {{-- Display description if available --}}
                            {{ $item->description ?? $item->title }}
                        </figcaption>
                    </div>
                @endforeach
            </div>
        @endforeach



    </div>
    @include('partials.footer')
</body>

</html>
