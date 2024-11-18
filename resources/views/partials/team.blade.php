<div class="bg-gray-100 h-screen" id="aparatur">
    <!-- Team -->
    <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto bg-gray-100">
        <!-- Title -->
        <div class="max-w-2xl mx-auto text-center mb-5 ">
            <h2 class="text-2xl font-bold md:text-4xl md:leading-tight" >Aparatur</h2>
            <p class="mt-1 text-gray-600">Desa Bukian</p>
        </div>
        <!-- End Title -->

        <div data-hs-carousel='{ "loadingClasses": "opacity-0", "isAutoPlay": true, "dotsItemClasses": "hs-carousel-active:bg-blue-700 hs-carousel-active:border-blue-700 size-3 border border-gray-400 rounded-full cursor-pointer","slidesQty": { "xs": 1, "lg": 3 }}' class="relative">
            <div class="hs-carousel w-full overflow-hidden">
                <div class="relative h-[720px] -mx-1">
                    <div class="hs-carousel-body absolute top-0 bottom-0 start-0 flex flex-nowrap opacity-0 transition-transform duration-700 p-3">
                        @foreach ($pengurus as $p)
                        <!-- Slide -->
                        <div class="hs-carousel-slide px-1">
                            <div class="flex flex-col items-center">
                                <img src="{{ asset('assets/image/pengurus_desa/' . $p->gambar) }}" class="w-full object-cover rounded-lg" alt="{{ $p->nama }}">
                                <div class="mt-2 text-center">
                                    <p class="font-semibold text-lg">{{ $p->nama }}</p>
                                    <p class="text-gray-600">{{ $p->jabatan }}</p>
                                </div>
                            </div>
                        </div>
                        <!-- End Slide -->
                        @endforeach
                    </div>
                </div>
            </div>
            <button type="button" class="hs-carousel-prev hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 start-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-s-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <span class="text-2xl" aria-hidden="true">
                  <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m15 18-6-6 6-6"></path>
                  </svg>
                </span>
                <span class="sr-only">Previous</span>
              </button>
              <button type="button" class="hs-carousel-next hs-carousel-disabled:opacity-50 hs-carousel-disabled:pointer-events-none absolute inset-y-0 end-0 inline-flex justify-center items-center w-[46px] h-full text-gray-800 hover:bg-gray-800/10 focus:outline-none focus:bg-gray-800/10 rounded-e-lg dark:text-white dark:hover:bg-white/10 dark:focus:bg-white/10">
                <span class="sr-only">Next</span>
                <span class="text-2xl" aria-hidden="true">
                  <svg class="shrink-0 size-5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <path d="m9 18 6-6-6-6"></path>
                  </svg>
                </span>
              </button>
            {{-- <div class="hs-carousel-pagination flex justify-center absolute bottom-3 start-0 end-0 space-x-2"></div> --}}
        </div>
        
    </div>
    <!-- End Team -->
</div>
