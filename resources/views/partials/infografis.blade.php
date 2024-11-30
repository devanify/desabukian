<div id="infografis">
  <div class="mt-[50px]">
      <h2 class="text-2xl font-bold md:text-3xl text-center">Infografis Penduduk Desa Bukian</h2>
      
      @if($infografis)
          <h2 class="text-xl font-bold md:text-2xl text-center mt-3">Tahun {{ $infografis->tahun }}</h2>
      @else
          <h2 class="text-xl font-bold md:text-2xl text-center mt-3 text-red-500">Data tidak tersedia untuk tahun {{ $currentYear }}</h2>
      @endif

      <div class="flex justify-center">
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
                        <a href="{{ route('home', ['year' => $year]) }}#infografis"
                            class="flex items-center gap-x-3.5 py-2 px-3 rounded-lg text-sm text-gray-800 hover:bg-gray-100 focus:outline-none focus:bg-gray-100">
                            {{ $year }}
                        </a>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- End Form Filter Tahun -->
      </div>
  </div>

  <!-- Icon Blocks -->
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto mb-[100px]">
      @if($infografis)
          <!-- Grid -->
          <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
              <!-- Icon Block -->
              <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5">
                  <!-- Icon -->
                  <div class="flex justify-center items-center size-15 rounded-full mx-auto">
                      <img src="{{ asset('assets/image/masyarakat.svg') }}" class="w-16 h-16" alt="">
                  </div>
                  <!-- End Icon -->
                  <div class="mt-3">
                      <h3 class="text-sm sm:text-lg font-semibold text-gray-800">
                          Jumlah Penduduk
                      </h3>
                      <h4>
                          {{ $infografis->jumlah_penduduk }} Orang
                      </h4>
                  </div>
              </div>
              <!-- End Icon Block -->
              <!-- Icon Block -->
            <div
            class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5">
            <!-- Icon -->
            <div class="flex justify-center items-center size-15 mx-auto">
                <img src="{{ asset('assets/image/family.png') }}" alt="" class="w-16 h-16">
            </div>
            <!-- End Icon -->

            <div class="mt-3">
                <h3 class="text-sm sm:text-lg font-semibold text-gray-800">
                    Kepala Keluarga
                </h3>
                <h4>
                  {{ $infografis->jumlah_kk }} Orang
              </h4>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div
            class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5">
            <!-- Icon -->
            <div class="flex justify-center items-center size-15  rounded-full mx-auto">
                <img src="{{ asset('assets/image/perempuan.png') }}" alt="" class="w-16 h-16">
            </div>
            <!-- End Icon -->

            <div class="mt-3">
                <h3 class="text-sm sm:text-lg font-semibold text-gray-800">
                    Perempuan
                </h3>
                <h4>
                  {{ $infografis->jumlah_perempuan }} Orang
              </h4>
            </div>
        </div>
        <!-- End Icon Block -->

        <!-- Icon Block -->
        <div
            class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5">
            <!-- Icon -->
            <div class="flex justify-center items-center size-15 rounded-full mx-auto">
                <img src="{{ asset('assets/image/lakilaki.png') }}" class="w-16 h-16" alt="">
            </div>
            <!-- End Icon -->

            <div class="mt-3">
                <h3 class="text-sm sm:text-lg font-semibold text-gray-800">
                    Laki-Laki
                </h3>
                <h4>
                  {{ $infografis->jumlah_pria }} Orang
              </h4>
            </div>
        </div>
        <!-- End Icon Block -->
          </div>
          <!-- End Grid -->
      @else
          <div class="text-center text-gray-500">
              Data infografis tidak tersedia untuk tahun {{ $currentYear }}.
          </div>
      @endif
  </div>
  <!-- End Icon Blocks -->
</div>
