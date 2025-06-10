<header class="bg-white shadow-sm z-30">
  <div class="flex items-center justify-between px-6 py-4">
    <div class="flex items-center">
      <!-- Hamburger Button -->
      <button @click="sidebarOpen = !sidebarOpen" 
              class="mr-4 text-gray-600 hover:text-orange-600 focus:outline-none">
        <i x-show="!sidebarOpen" class="fas fa-bars text-lg"></i>
      </button>
      
        
      <!-- Page Title -->
      <h2 class="text-lg font-bold text-orange-500">
        @hasSection('page-title')
          @yield('page-title')
        @else
          
        @endif
      </h2>
    </div>
    
    <div class="flex items-center space-x-4">
      <!-- Notifikasi -->
      <button class="p-1 text-gray-500 hover:text-orange-700">
        <i class="fas fa-bell"></i>
      </button>
      
      <!-- User dropdown -->
      <div x-data="{ open: false }" class="relative">
        <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
          <span class="text-sm font-medium">{{ Auth::user()->name }}</span>
          <i class="fas fa-chevron-down text-xs"></i>
        </button>
        
        <div x-show="open" @click.away="open = false" 
            class="absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50">
          <a href="{{ route('admin.profile') }}" class="block px-4 py-2 text-sm text-orange-700 hover:bg-gray-100">
            <i class="fas fa-user-circle mr-2"></i> Profile
          </a>
          <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
              <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
          </form>
        </div>
      </div>
    </div>
  </div>
</header>