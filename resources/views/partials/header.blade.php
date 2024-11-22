<header class="flex flex-wrap sm:justify-start sm:flex-nowrap w-full text-sm py-3 backdrop-blur bg-white/30 z-50 fixed">
    <nav class="max-w-[85rem] w-full mx-auto px-4 flex flex-wrap basis-full items-center justify-between">
      <a class="flex-none text-xl font-semibold  focus:outline-none focus:opacity-80" href="/" aria-label="Brand">
        <span class="inline-flex items-center gap-x-2 text-xl font-semibold text-gray-700">
          <img class="w-10 mr-3 h-auto" src="{{ asset('assets/image/bukian.png') }}" alt="Logo">
          Desa Bukian
        </span>
      </a>
      <div class="sm:order-3 flex items-center gap-x-2">
        <button type="button" class="sm:hidden hs-collapse-toggle relative size-7 flex justify-center items-center gap-x-2 rounded-lg border border-gray-200 bg-white text-gray-800 shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none" id="hs-navbar-alignment-collapse" aria-expanded="false" aria-controls="hs-navbar-alignment" aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-alignment">
          <svg class="hs-collapse-open:hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
          <span class="sr-only">Toggle</span>
        </button>
        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2  rounded-lg border border-gray-200 bg-white  shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none">
          <a href="/login" class="text-sm font-medium text-gray-800">Log In</a>
        </button>
      </div>
      <div id="hs-navbar-alignment" class="hs-collapse hidden overflow-hidden transition-all duration-300 basis-full grow sm:grow-0 sm:basis-auto sm:block sm:order-2" aria-labelledby="hs-navbar-alignment-collapse">
        <div class="flex flex-col gap-5 mt-5 sm:flex-row sm:items-center sm:mt-0 sm:ps-5">

          <!-- Dropdown -->
          <div class="hs-dropdown [--strategy:static] md:[--strategy:fixed] [--adaptive:none] [--is-collapse:true] md:[--is-collapse:false] ">
            <button id="hs-secondaru-navbar-dropdown" type="button" class="hs-dropdown-toggle w-full md:py-0 flex items-center font-medium text-base {{ request()->is('/') ? 'text-blue-700' : 'text-gray-800 hover:text-gray-500' }}" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
            
              Home
              <svg class="hs-dropdown-open:-rotate-180 md:hs-dropdown-open:rotate-0 duration-300 shrink-0 size-4 ms-auto md:ms-1" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m6 9 6 6 6-6"/></svg>
            </button>

            <div class="hs-dropdown-menu transition-[opacity,margin] duration-[0.1ms] md:duration-[150ms] hs-dropdown-open:opacity-100 opacity-0 relative w-full md:w-52 hidden z-10 top-full ps-7 md:ps-0 md:bg-white md:rounded-lg md:shadow-md before:absolute before:-top-4 before:start-0 before:w-full before:h-5 md:after:hidden after:absolute after:top-1 after:start-2 after:w-0.5 after:h-[calc(100%-0.25rem)] after:bg-gray-100 " role="menu" aria-orientation="vertical" aria-labelledby="hs-secondaru-navbar-dropdown">
              <div class="py-1 md:px-1 space-y-0.5">
                <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 " href="{{ route('home') }}/#aparatur">
                  Aparatur
                </a>
                <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 " href="{{ route('home') }}/#tentang">
                  Tentang
                </a>

                <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 " href="{{ route('home') }}/#visi&misi">
                  Visi & Misi
                </a>
                <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 " href="{{ route('home') }}/#lokasi">
                  Lokasi
                </a>
                <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 " href="{{ route('home') }}/#video">
                  Video Profile
                </a>
                <a class="py-1.5 md:px-2 flex items-center text-sm text-gray-800 hover:text-gray-500 focus:outline-none focus:text-gray-500 " href="{{ route('home') }}/#infografis">
                  Infografis
                </a>
              </div>
            </div>
          </div>
          <!-- End Dropdown -->

          <a class="font-medium text-base {{ request()->is('sejarah') ? 'text-blue-700' : 'text-gray-600 hover:text-gray-400' }}" href="{{ route('sejarah') }}">Sejarah </a>
          <a class="font-medium text-base {{ request()->is('galeri') ? 'text-blue-700' : 'text-gray-600 hover:text-gray-400' }}" href="{{ route('gallery') }}">Galeri </a>
          <a class="font-medium text-base {{ request()->is('blog') ? 'text-blue-700' : 'text-gray-600 hover:text-gray-400' }}" href="{{ route('artikel') }}">Artikel </a>
        </div>
      </div>
    </nav>
  </header>