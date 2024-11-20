<div id="infografis">
  <div class="mt-[50px]">
      <h2 class="text-2xl font-bold md:text-3xl text-center">Infografis Penduduk Desa Bukian</h2>
      <h2 class="text-xl font-bold md:text-2xl text-center mt-3">Tahun  {{ $infografis->tahun }}</h2>
  </div>
  
  <!-- Icon Blocks -->
  <div class="max-w-[85rem] px-4 py-10 sm:px-6 lg:px-8 lg:py-14 mx-auto mb-[100px]">
      <!-- Grid -->
      <div class="grid grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Icon Block -->
        <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5">
          <!-- Icon -->
          <div class="flex justify-center items-center size-15  rounded-full mx-auto">
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
        <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5">
          <!-- Icon -->
          <div class="flex justify-center items-center size-15 mx-auto">
            <img src="{{ asset('assets/image/family.png') }}" alt="" class="w-14 h-17" >
          </div>
          <!-- End Icon -->
    
          <div class="mt-3">
            <h3 class="text-sm sm:text-lg font-semibold text-gray-800">
              Kepala Keluarga
            </h3>
            <h4>
              {{ $infografis->jumlah_kk }} KK
            </h4>
          </div>
        </div>
        <!-- End Icon Block -->
  
        <!-- Icon Block -->
        <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5">
          <!-- Icon -->
          <div class="flex justify-center items-center size-15  rounded-full mx-auto">
            <img src="{{ asset('assets/image/perempuan.png') }}" alt="" class="w-16 h-16" >
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
        <div class="h-36 sm:h-56 flex flex-col justify-center border border-gray-200 rounded-xl text-center p-4 md:p-5">
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
    </div>
    <!-- End Icon Blocks -->
</div>