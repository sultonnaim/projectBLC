<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin | BLC Surabaya</title>

  <!-- AdminLTE CSS -->
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/css/adminlte.min.css') }}">
  <link rel="stylesheet" href="{{ asset('vendor/adminlte/plugins/fontawesome-free/css/all.min.css') }}">

  <!-- Custom CSS -->

</head>
<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Navbar -->
    @include('layouts.partials.admin.navbar')

    <!-- Sidebar -->
    @include('layouts.partials.admin.sidebar')

    <!-- Content Wrapper -->
    <div class="content-wrapper">
      @yield('content') <!-- Content dari admin dashboard -->
    </div>

  </div>

  <!-- Scripts -->
  <script src="{{ asset('vendor/adminlte/plugins/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/adminlte/js/adminlte.min.js') }}"></script>

</body>
</html>