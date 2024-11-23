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
                        Pengumuman
                    </a>
                </li>
            </ol>
        </div>

    </div>
    <!--Pengumuman Start-->
    <div class="container mx-auto px-4 py-8 max-w-[60rem] mb-[100px]">
        <div class="max-w-2xl mx-auto text-center mb-10 lg:mb-14">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Pengumuman</h2>
        </div>
        <div class="space-y-6">
            <!-- Card 1 -->
            @foreach ($pengumuman as $p )
            <div class="flex flex-col sm:flex-row items-start gap-4 border-b pb-6">
                <!-- SVG Icon -->
                <a href="" class="w-full sm:w-36 h-36 object-cover rounded-md flex-none hidden sm:block">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32" fill="rgb(55 65 81)">
                        <path
                            d="M28,12h-2V6.7C26,6,25.6,5.4,25,5c-0.6-0.4-1.4-0.4-2,0l-12.3,7L7,12c-2.2,0-4,1.8-4,4c0,1.5,0.8,2.7,2,3.4V26c0,1.1,0.9,2,2,2h3c1.1,0,2-0.9,2-2v-5.3L23,27c0.3,0.2,0.7,0.3,1,0.3c0.3,0,0.7-0.1,1-0.3c0.6-0.4,1-1,1-1.7V20h2c1.1,0,2-0.9,2-2v-4C30,12.9,29.1,12,28,12z M7,14l3,0v4l-3,0c-1.1,0-2-0.9-2-2C5,14.9,5.9,14,7,14z M7,26v-6h3l0,6H7z M24,25.3l-11.9-6.9L12,13.6l12-6.9V12v8V25.3z M26,18v-4h2l0,4H26z">
                        </path>
                    </svg>
                </a>
            
                <!-- Text Content -->
                <div class="flex flex-col justify-center">
                    <h2 class="text-lg font-semibold text-gray-900 mb-2">
                        <a href="{{ route('pengumumanview',$p->slug) }}" class="hover:text-blue-500">{{ $p->judul }}</a>
                    </h2>
                    <p class="text-gray-600 mb-2">
                        {!! nl2br(e(implode(' ', array_slice(explode(' ', strip_tags($p->keterangan)), 0, 20)))) !!} ...

                    </p>
                    <div class="text-sm text-gray-500">
                        <p>{{ \Carbon\Carbon::parse($p->tanggal_publikasi)->format('d M Y') }} · Desa Bukian</p>
                    </div>
                </div>
            </div>            
            @endforeach
            

            
        </div>
        <div class="flex mt-[40px] mx-auto justify-center">
            {{ $pengumuman->links() }} <!-- Pagination links -->
        </div>
    </div>
    <!--Pengumuman Start-->
    @include('partials.footer')
</body>

</html>
