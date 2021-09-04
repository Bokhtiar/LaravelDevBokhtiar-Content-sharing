<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Blog - Anyar Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="{{ asset('user') }}/assets/img/favicon.png" rel="icon">
  <link href="{{ asset('user') }}/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('user') }}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="{{ asset('user') }}/assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('user') }}/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Anyar - v2.2.1
  * Template URL: https://bootstrapmade.com/anyar-free-multipurpose-one-page-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

@include('layouts.user.partial.header')

  <main id="main">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <ol>
          <li><a href="index.html">Home</a></li>
          <li>Blog</li>
        </ol>
        <h2>Blog</h2>

      </div>
    </section><!-- End Breadcrumbs -->

    @yield('user_content')

  </main><!-- End #main -->

  @include('layouts.user.partial.footer')

  <a href="#" class="back-to-top"><i class="ri-arrow-up-line"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('user') }}/assets/vendor/jquery/jquery.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/php-email-form/validate.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/venobox/venobox.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="{{ asset('user') }}/assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('user') }}/assets/js/main.js"></script>

</body>

</html>
