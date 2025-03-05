<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foodio - Home 1</title>
  <link rel="icon" href="{{ asset('giaodien') }}/assets/img/logo-icon.png">
  
  <!-- CSS only -->
  <link rel="stylesheet" type="text/css" href="{{ asset('giaodien') }}/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ asset('giaodien') }}/assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="{{ asset('giaodien') }}/assets/css/owl.theme.default.min.css">
  <!-- fancybox -->
  <link rel="stylesheet" href="{{ asset('giaodien') }}/assets/css/jquery.fancybox.min.css">
  <!-- Font Awesome 6 -->
  <link rel="stylesheet" href="{{ asset('giaodien') }}/assets/css/fontawesome.min.css">
  <!-- style -->
  <link rel="stylesheet" href="{{ asset('giaodien') }}/assets/css/style.css">
  <!-- responsive -->
  <link rel="stylesheet" href="{{ asset('giaodien') }}/assets/css/responsive.css">
  <!-- color -->
  <link rel="stylesheet" href="{{ asset('giaodien') }}/assets/css/color.css">
  
  <!-- jQuery -->
  <script src="{{ asset('giaodien') }}/assets/js/jquery-3.6.0.min.js"></script>
  <script src="{{ asset('giaodien') }}/assets/js/preloader.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

  @include('giaodien.layout.header')

   <main>
        @yield('content')
    </main>

  @include('giaodien.layout.footer')

  <div id="progress">
      <span id="progress-value"><i class="fa-solid fa-arrow-up"></i></span>
  </div>

  <!-- Bootstrap Js -->
  <script src="{{ asset('giaodien') }}/assets/js/bootstrap.min.js"></script>
  <script src="{{ asset('giaodien') }}/assets/js/owl.carousel.min.js"></script>
  <!-- fancybox -->
  <script src="{{ asset('giaodien') }}/assets/js/jquery.fancybox.min.js"></script>
  <script src="{{ asset('giaodien') }}/assets/js/custom.js"></script>
  <!-- Form Script -->
  <script src="{{ asset('giaodien') }}/assets/js/contact.js"></script>
  <script type="text/javascript" src="{{ asset('giaodien') }}/assets/js/sweetalert.min.js"></script>

</body>
</html>
