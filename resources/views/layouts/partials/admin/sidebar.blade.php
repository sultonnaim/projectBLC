<aside x-data="{ mobileSidebarOpen: false }" 
      class="fixed inset-y-0 left-0 z-30 w-64 bg-white shadow-lg transform lg:translate-x-0 transition-transform duration-200 ease-in-out"
      :class="{ '-translate-x-full': !mobileSidebarOpen }">
  
<div class="mx-auto flex max-w-sm items-center gap-x-4 rounded-xl bg-white p-6 shadow-lg dark:-outline-offset-1 dark:outline-white/10">
    <img src="/images/logo.png" alt="Logo Blc" class="h-10 w-auto">
    <h1 class="text-xl font-bold text-orange-500 ">Broadband Learning Center</h1>
    <button @click="mobileSidebarOpen = false" class="lg:hidden text-gray-500">
      <i class="fas fa-times"></i>
    </button>
  </div>
  
  <!-- Menu Container: Scrollable -->
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

        <!-- Menu Utama -->
        <div x-data="{ open: false }" class="space-y-1">
          <!-- Trigger Dropdown -->
          <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-2 text-sm font-medium text-gray-700 rounded-lg hover:bg-gray-100 transition-colors">
            <span class="flex items-center">
              <i class="fas fa-users mr-3"></i>
              Peserta
            </span>
            <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="{ 'rotate-180': open }"></i>
          </button>
          
          <!-- Submenu -->
          <div x-show="open" x-collapse class="pl-8 space-y-1">
            <a href="{{ route('admin.peserta.index') }}" 
              class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-50 {{ request()->routeIs('admin.peserta.index') ? 'bg-orange-100 text-orange-800' : '' }}">
              <i class="fas fa-list mr-2"></i>
              Daftar Peserta
            </a>
            <a href="{{ route('admin.peserta.create') }}" 
              class="block px-4 py-2 text-sm text-gray-600 rounded hover:bg-gray-50 {{ request()->routeIs('admin.peserta.create') ? 'bg-orange-100 text-orange-800' : '' }}">
              <i class="fas fa-plus-circle mr-2"></i>
              Tambah Peserta
            </a>
          </div>
        </div>
    
      <!-- Dropdown Menu: Kelas -->
      <div x-data="{ open: {{ request()->routeIs('admin.kelas.*') ? 'true' : 'false' }} }" class="mt-2">
        <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg text-gray-800 hover:bg-orange-500 transition-colors">
          <div class="flex items-center">
            <i class="fas fa-chalkboard-teacher mr-3"></i>
            <span>Kelas</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="{'transform rotate-180': open}"></i>
        </button>
        <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
          <a href="{{ route('admin.kelas.index') }}" 
            class="flex items-center px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.kelas.index') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-list mr-3"></i>
            <span>Daftar Kelas</span>
          </a>
        </div>

      <!-- Dropdown Menu: Pelatihan -->
      <div x-data="{ open: {{ request()->routeIs('admin.pelatihan.*') ? 'true' : 'false' }} }" class="mt-2">
        <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg text-gray-800 hover:bg-orange-500 transition-colors">
          <div class="flex items-center">
            <i class="fas fa-graduation-cap mr-3"></i>
            <span>Pelatihan</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="{'transform rotate-180': open}"></i>
        </button>
        <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
          <a href="{{ route('admin.dashboardadmin') }}" 
            class="flex items-center px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.dashboardadmin') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-plus-circle mr-3"></i>
            <span>Entry Pelatihan</span>
          </a>
          <a href="{{ route('admin.dashboardadmin') }}" 
            class="flex items-center px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.dashboardadmin') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-file-alt mr-3"></i>
            <span>Laporan Pelatihan</span>
          </a>
        </div>
      </div>

      <!-- Dropdown Menu: Pengunjung -->
      <div x-data="{ open: {{ request()->routeIs('admin.pengunjung.*') ? 'true' : 'false' }} }" class="mt-2">
        <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg text-gray-800 hover:bg-orange-500 transition-colors">
          <div class="flex items-center">
            <i class="fas fa-user-friends mr-3"></i>
            <span>Pengunjung</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="{'transform rotate-180': open}"></i>
        </button>
        <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
          <a href="{{ route('admin.pengunjung.index') }}" 
            class="flex items-center px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.pengunjung.index') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-list mr-3"></i>
            <span>Daftar Pengunjung</span>
          </a>
          <a href="{{ route('admin.dashboardadmin') }}" 
            class="flex items-center px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.dashboardadmin') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-chart-bar mr-3"></i>
            <span>Laporan Kunjungan</span>
          </a>
        </div>
      </div>

      <!-- Dropdown Menu: Ujian -->
      <div x-data="{ open: {{ request()->routeIs('admin.ujian.*') ? 'true' : 'false' }} }" class="mt-2">
        <button @click="open = !open" class="w-full flex items-center justify-between px-4 py-3 text-sm font-medium rounded-lg text-gray-800 hover:bg-orange-500 transition-colors">
          <div class="flex items-center">
            <i class="fas fa-clipboard-check mr-3"></i>
            <span>Ujian</span>
          </div>
          <i class="fas fa-chevron-down text-xs transition-transform duration-200" :class="{'transform rotate-180': open}"></i>
        </button>
        <div x-show="open" x-collapse class="ml-4 mt-1 space-y-1">
          <a href="{{ route('admin.dashboardadmin') }}" 
            class="flex items-center px-4 py-2 text-sm rounded-lg transition-all
                    {{ request()->routeIs('admin.dashboardadmin') ? 
                      'bg-orange-100 text-orange-600' : 
                      'text-gray-800 hover:bg-orange-400' }}">
            <i class="fas fa-clipboard-list mr-3"></i>
            <span>Master Ujian</span>
          </a>
        </div>
      </div>
</aside>