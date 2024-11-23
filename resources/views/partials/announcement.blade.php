<div class="bg-gray-100">
    <!-- Team -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-gray-100" id="aparatur">
        <div class="flex flex-row mb-[30px] text-gray-700 mt-[80px]">
            <svg class="h-[40px] flex-none w-14 " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 32 32"
                fill="rgb(55 65 81)">
                <path
                    d="M28,12h-2V6.7C26,6,25.6,5.4,25,5c-0.6-0.4-1.4-0.4-2,0l-12.3,7L7,12c-2.2,0-4,1.8-4,4c0,1.5,0.8,2.7,2,3.4V26c0,1.1,0.9,2,2,2h3c1.1,0,2-0.9,2-2v-5.3L23,27c0.3,0.2,0.7,0.3,1,0.3c0.3,0,0.7-0.1,1-0.3c0.6-0.4,1-1,1-1.7V20h2c1.1,0,2-0.9,2-2v-4C30,12.9,29.1,12,28,12z M7,14l3,0v4l-3,0c-1.1,0-2-0.9-2-2C5,14.9,5.9,14,7,14z M7,26v-6h3l0,6H7z M24,25.3l-11.9-6.9L12,13.6l12-6.9V12v8V25.3z M26,18v-4h2l0,4H26z">
                </path>
            </svg>
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight ">Pengumuman</h2>
        </div>

        <!-- Announcement Cards Start -->
        {{-- <div class="announcement-cards grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
            <!-- Card 1 Start -->
            <div class="card bg-white shadow-md rounded-lg p-5 flex gap-4">
                <div class="number-container flex justify-center items-center">
                    <div class="number text-4xl font-bold text-gray-400">01</div>
                </div>
                <div class="content">
                    <h2 class="title text-xl font-bold mb-2">
                        <a href="" class="text-gray-800 hover:underline">JARONG KATAR FESTIVAL</a>
                    </h2>
                    <div class="item-attr text-sm text-gray-600 flex items-center gap-2">
                        <p class="date">16 May 2018</p>
                        <span class="dotted">·</span>
                        <p class="publisher">DesaBukian</p>
                    </div>
                </div>
            </div>
            <!-- Card 1 End -->

            <!-- Card 2 Start -->
            <div class="card bg-white shadow-md rounded-lg p-5 flex gap-4">
                <div class="number-container flex justify-center items-center">
                    <div class="number text-4xl font-bold text-gray-400">02</div>
                </div>
                <div class="content">
                    <h2 class="title text-xl font-bold mb-2">
                        <a href="" class="text-gray-800 hover:underline">JARONG KATAR FESTIVAL</a>
                    </h2>
                    <div class="item-attr text-sm text-gray-600 flex items-center gap-2">
                        <p class="date">16 May 2018</p>
                        <span class="dotted">·</span>
                        <p class="publisher">Desa Bukian</p>
                    </div>
                </div>
            </div>
            <!-- Card 2 End -->

            <!-- Card 3 Start -->
            <div class="card bg-white shadow-md rounded-lg p-5 flex gap-4">
                <div class="number-container flex justify-center items-center">
                    <div class="number text-4xl font-bold text-gray-400">05</div>
                </div>
                <div class="content flex items-center justify-center">
                    <a class="link-item text-gray-800 hover:underline text-lg font-medium"
                        href="">Selengkapnya</a>
                </div>
            </div>
            <!-- Card 3 End -->
        </div> --}}

        <div class="announcement-cards grid grid-cols-1 sm:grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4  mb-[100px]">
            @forelse ($pengumuman as $p)
                <!-- Card Start -->
                <div class="card bg-white shadow-md rounded-lg p-5 flex gap-4">
                    <!-- Number Container -->
                    <div class="number-container flex justify-center items-center">
                        <div class="number text-4xl font-bold text-gray-400">
                            {{ $loop->iteration < 10 ? '0' . $loop->iteration : $loop->iteration }}</div>
                    </div>

                    <!-- Content -->
                    <div class="content">
                        <h2 class="title text-xl font-bold mb-2">
                            <a href="{{ route('pengumuman.show', $p->id) }}" class="text-gray-800 hover:underline">
                                {{ $p->judul }}
                            </a>
                        </h2>
                        <div class="item-attr text-sm text-gray-600 flex items-center gap-2">
                            <p class="date">{{ \Carbon\Carbon::parse($p->tanggal_publikasi)->format('d M Y') }}</p>
                            <span class="dotted">·</span>
                            <p class="publisher">Desa Bukian</p>
                        </div>
                    </div>
                </div>
                <!-- Card End -->

                @if ($loop->last)
                    <!-- Check if it's the last iteration (Card 3) -->
                    <!-- Card -->
                    <!-- End Card -->
                    <div class="card  p-5 flex gap-4 ">
                        <div class="content flex items-center justify-center">
                            <a class="py-3 px-4 inline-flex items-center gap-x-1 text-lg font-medium  text-blue-600"
                            href="{{ route('pengumuman') }}">
                            Pengumumna Lainnya
                            <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24"
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </a>
                        </div>
                    </div>
                @endif

            @empty
                <!-- Jika tidak ada pengumuman -->
                <div class="card bg-white shadow-md rounded-lg p-5 flex justify-center items-center col-span-3 mb-[100px]">
                    <p class="text-gray-600 text-lg">Tidak ada pengumuman saat ini.</p>
                </div>
            @endforelse
        </div>

        <!-- Announcement Cards End -->


    </div>
</div>
