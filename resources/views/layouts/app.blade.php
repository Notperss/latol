<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>@yield('title')</title>

  <!-- Style -->
  @stack('before-style')
  <link rel="stylesheet" href="{{ asset('dist/assets/css/bootstrap.css') }}">

  {{-- <link rel="stylesheet" href="{{ asset('dist/assets/vendors/chartjs/Chart.min.css') }}"> --}}



  <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
  <link rel="stylesheet" href="{{ asset('dist/assets/vendors/simple-datatables/style.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.css') }}">
  <link rel="stylesheet" href="{{ asset('dist/assets/css/app.css') }}">
  <link rel="shortcut icon" href="{{ asset('dist/assets/images/favicon.svg') }}" type="image/x-icon">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  @stack('after-style')
  <!-- /Style -->

</head>

<body>
  <div id="app">

    <div id="sidebar" class='active'>
      <div class="sidebar-wrapper active">
        <div class="sidebar-header">
          <img src="{{ asset('dist/assets/images/logo.svg') }}" alt="" srcset="">
        </div>

        <x-menu />

        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
      </div>
    </div>

    <div id="main">

      <x-validation-errors />

      <x-web.header />

      <div class="main-content container-fluid">

        <div class="page-title">
          @yield('breadcrumb')
        </div>

        @yield('content')

      </div>

      <footer>
        <div class="footer clearfix mb-0 text-muted">
          <div class="float-left">
            <p>
              <script>
                document.write(new Date().getFullYear())
              </script> &copy; Divisi TI
            </p>
          </div>
          <div class="float-right">
            <p>
              Crafted with
              <span class='text-danger'><i data-feather="heart"></i></span>
              by Notpers
            </p>
          </div>
        </div>
      </footer>

    </div>

  </div>

  <!-- Script -->
  @stack('before-script')
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('dist/assets/js/feather-icons/feather.min.js') }}"></script>
  <script src="{{ asset('dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('dist/assets/js/app.js') }}"></script>

  {{-- <script src="{{ asset('dist/assets/vendors/chartjs/Chart.min.js') }}"></script>
  <script src="{{ asset('dist/assets/vendors/apexcharts/apexcharts.min.js') }}"></script>
  <script src="{{ asset('dist/assets/js/pages/dashboard.js') }}"></script> --}}

  <script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
  <script src="{{ asset('dist/assets/js/main.js') }}"></script>
  <script src="{{ asset('dist/assets/vendors/simple-datatables/simple-datatables.js') }}"></script>
  <script src="{{ asset('') }}dist/assets/js/vendors.js"></script>

  @stack('after-script')
  <!-- /Script -->

</body>

</html>
