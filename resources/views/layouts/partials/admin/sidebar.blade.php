<aside x-data="{ 
        mobileSidebarOpen: false,
        openMenus: {
            peserta: {{ request()->routeIs('admin.peserta.*') ? 'true' : 'false' }},
            kelas: {{ request()->routeIs('admin.kelas.*') ? 'true' : 'false' }},
            pelatihan: {{ request()->routeIs('admin.pelatihan.*') ? 'true' : 'false' }},
            pengunjung: {{ request()->routeIs('admin.pengunjung.*') ? 'true' : 'false' }},
            laporan: {{ request()->routeIs('admin.laporan.*') ? 'true' : 'false' }},
            ujian: {{ request()->routeIs('admin.ujian.*') ? 'true' : 'false' }}
        }
      }"
      class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-lg transform lg:translate-x-0 transition-transform duration-200 ease-in-out"
      :class="{ '-translate-x-full': !mobileSidebarOpen }"
      @click.away="if(!$screen('lg')) mobileSidebarOpen = false">
  <!-- Logo Section -->
  <div class="flex items-center justify-between p-4 border-b">
    <div class="flex items-center gap-x-3">
      <img src="/images/logo.png" alt="Logo Blc" class="h-10 w-auto">
      <h1 class="text-xl font-bold text-orange-500">Broadband Learning Center</h1>
    </div>
    <button @click="mobileSidebarOpen = false" class="lg:hidden text-gray-500 hover:text-orange-600">
      <i class="fas fa-times"></i>
    </button>
  </div>
  
  
  <!-- Menu Container -->
  <div class="overflow-y-auto h-[calc(100vh-5rem)] px-2 py-4 scrollbar-thin scrollbar-thumb-orange-300 scrollbar-track-orange-100">
    <nav class="p-4 space-y-1">
      <!-- Dashboard -->
      <a href="{{ route('admin.dashboardadmin') }}" 
        class="flex items-center px-4 py-3 text-sm font-medium rounded-lg transition-all
                {{ request()->routeIs('admin.dashboardadmin') ? 
                  'bg-orange-100 text-orange-600' : 
                  'text-gray-800 hover:bg-orange-500' }}">
        <i class="fas fa-tachometer-alt mr-3"></i>
        <span>Dashboard</span>
      </a>

      <!-- Menu Pengunjung -->
      <div class="space-y-1">
        <button @click="openMenus.pengunjung = !openMenus.pengunjung" 
                class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg transition-all
                      {{ request()->routeIs('admin.pengunjung.*') ? 
                        'bg-orange-100 text-orange-600' : 
                        'text-gray-800 hover:bg-orange-500' }}">
          <div class="flex items-center">
            <i class="fas fa-user-friends mr-3"></i>
            <span>Pengunjung</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" 
              :class="{ 'rotate-180': openMenus.pengunjung }"></i>
        </button>
        <div x-show="openMenus.pengunjung" x-collapse class="pl-8 space-y-1">
          <a href="{{ route('admin.pengunjung.index') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.pengunjung.index') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-list mr-2"></i>
            Daftar
          </a>
              {{-- <a href="{{ route('admin.pengunjung.entryfoto') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.pengunjung.entryfoto') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-plus-circle mr-2"></i>
            Tambah foto --}}
              </a>
          <a href="{{ route('admin.pengunjung.laporanfoto') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.pengunjung.laporanfoto') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-chart-bar mr-2"></i>
            foto
          </a>
          <a href="{{ route('admin.pengunjung.laporan') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.pengunjung.laporan') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-chart-bar mr-2"></i>
            kegiatan
          </a>
        </div>
      </div>

      <!-- Menu Peserta -->
      <div class="space-y-1">
        <button @click="openMenus.peserta = !openMenus.peserta" 
                class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg transition-all
                      {{ request()->routeIs('admin.peserta.*') ? 
                        'bg-orange-100 text-orange-600' : 
                        'text-gray-800 hover:bg-orange-500' }}">
          <span class="flex items-center">
            <i class="fas fa-users mr-3"></i>
            Peserta
          </span>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" 
            :class="{ 'rotate-180': openMenus.peserta }"></i>
        </button>
        
        <div x-show="openMenus.peserta" x-collapse class="pl-8 space-y-1">
          <a href="{{ route('admin.peserta.index') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                  {{ request()->routeIs('admin.peserta.index') ? 
                    'bg-orange-100 text-orange-600' : 
                    'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-list mr-2"></i>
            Daftar Peserta
          </a>
          <a href="{{ route('admin.peserta.create') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                  {{ request()->routeIs('admin.peserta.create') ? 
                    'bg-orange-100 text-orange-600' : 
                    'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-plus-circle mr-2"></i>
            Tambah Peserta
          </a>
        </div>
      </div>
    
      <!-- Menu Kelas -->
      <div class="space-y-1">
        <button @click="openMenus.kelas = !openMenus.kelas" 
                class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg transition-all
                        {{ request()->routeIs('admin.kelas.*') ? 
                          'bg-orange-100 text-orange-600' : 
                          'text-gray-800 hover:bg-orange-500' }}">
          <div class="flex items-center">
            <i class="fas fa-chalkboard-teacher mr-3"></i>
            <span>Kelas</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" 
              :class="{ 'rotate-180': openMenus.kelas }"></i>
        </button>
        <div x-show="openMenus.kelas" x-collapse class="pl-8 space-y-1">
          <a href="{{ route('admin.kelas.index') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.kelas.index') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-list mr-2"></i>
            Daftar Kelas
          </a>
        </div>
      </div>

      <!-- Menu Pelatihan -->
      <div class="space-y-1">
        <button @click="openMenus.pelatihan = !openMenus.pelatihan" 
                class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg transition-all
                        {{ request()->routeIs('admin.pelatihan.*') ? 
                          'bg-orange-100 text-orange-600' : 
                          'text-gray-800 hover:bg-orange-500' }}">
          <div class="flex items-center">
            <i class="fas fa-graduation-cap mr-3"></i>
            <span>Pelatihan</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" 
              :class="{ 'rotate-180': openMenus.pelatihan }"></i>
        </button>
        <div x-show="openMenus.pelatihan" x-collapse class="pl-8 space-y-1">
          <a href="{{ route('admin.pelatihan.index') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.pelatihan.index') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-plus-circle mr-2"></i>
            Kehadiran
          </a>
          <a href="{{ route('admin.pelatihan.laporan') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.pelatihan.laporan') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-file-alt mr-2"></i>
            Laporan
          </a>
        </div>
      </div>


    <!-- laporan sosialisasi -->
      <div class="space-y-1">
        <button @click="openMenus.sosialisasi = !openMenus.sosialisasi" 
                class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg transition-all
                      {{ request()->routeIs('admin.sosialisasi.*') ? 
                        'bg-orange-100 text-orange-600' : 
                        'text-gray-800 hover:bg-orange-500' }}">
          <div class="flex items-center">
            <i class="fas fa-comments mr-3"></i>
            <span>sosialisasi</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" 
             :class="{ 'rotate-180': openMenus.sosialisasi }"></i>
        </button>
        <div x-show="openMenus.sosialisasi" x-collapse class="pl-8 space-y-1">
          <a href="{{ route('admin.sosialisasi.entryfoto') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                   {{ request()->routeIs('admin.sosialisasi.entryfoto') ? 
                     'bg-orange-100 text-orange-600' : 
                     'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-plus-circle mr-2"></i>
           Tambah
          </a>
          <a href="{{ route('admin.sosialisasi.laporanfoto') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                   {{ request()->routeIs('admin.sosialiasi.laporanfoto') ? 
                     'bg-orange-100 text-orange-600' : 
                     'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-book mr-2"></i>
           Laporan
          </a>
        </div>
      </div>

            <!-- laporan instruktur -->
      <div class="space-y-1">
        <button @click="openMenus.laporan = !openMenus.laporan" 
                class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg transition-all
                      {{ request()->routeIs('admin.laporan.*') ? 
                        'bg-orange-100 text-orange-600' : 
                        'text-gray-800 hover:bg-orange-500' }}">
          <div class="flex items-center">
            <i class="fas fa-user mr-3"></i>
            <span>instruktur</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" 
             :class="{ 'rotate-180': openMenus.laporan }"></i>
        </button>
        <div x-show="openMenus.laporan" x-collapse class="pl-8 space-y-1">
          <a href="{{ route('admin.pengunjung.index') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                   {{ request()->routeIs('admin.pengunjung.index') ? 
                     'bg-orange-100 text-orange-600' : 
                     'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-book mr-2"></i>
           Laporan
          </a>
        </div>
      </div>

 
      <!-- Menu Ujian -->
      <div class="space-y-1">
        <button @click="openMenus.ujian = !openMenus.ujian" 
                class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg transition-all
                       {{ request()->routeIs('admin.ujian.*') ? 
                         'bg-orange-100 text-orange-600' : 
                         'text-gray-800 hover:bg-orange-500' }}">
          <div class="flex items-center">
            <i class="fas fa-clipboard-check mr-3"></i>
            <span>Ujian</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" 
             :class="{ 'rotate-180': openMenus.ujian }"></i>
        </button>
        <div x-show="openMenus.ujian" x-collapse class="pl-8 space-y-1">
          <a href="{{ route('admin.dashboardadmin') }}" 
            class="block px-4 py-2 text-sm rounded-lg transition-all
                   {{ request()->routeIs('admin.dashboardadmin') ? 
                     'bg-orange-100 text-orange-600' : 
                     'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-clipboard-list mr-2"></i>
            Master Ujian
          </a>
        </div>
      </div>
    </nav>
  </div>
</aside>