<!DOCTYPE html>
<html...>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Admin | BLC Surabaya')</title>

    <!-- Font Inter (Google Fonts) -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Font Awesome Icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

    <!-- Vite CSS (Tailwind) -->
    @vite(['resources/css/app.css'])

    <!-- Custom CSS -->
<link href="{{ asset('css/admin.css') }}" rel="stylesheet">
    
    @stack('styles')
</head>

<body>
    <div class="min-h-screen flex flex-col lg:flex-row">
    <!-- Sidebar -->
    @include('layouts.partials.superadmin.sidebar')

    <!-- Main Content -->
    <div class="flex-1 flex flex-col overflow-hidden lg:ml-64">
        <!-- Navbar -->
        @include('layouts.partials.superadmin.navbar')

        <!-- Dynamic Content -->
        <main class="flex-1 overflow-y-auto p-6 bg-gray-50">
        @yield('content')
        </main>

        <!-- Footer -->
        @include('layouts.partials.superadmin.footer')

        <!-- Custom Script -->
        <script src="{{ asset('js/admin.js') }}"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    </div>
    </div>
</body>
</html>