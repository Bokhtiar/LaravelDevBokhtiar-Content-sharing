<!-- ======= Top Bar ======= -->
<div id="topbar" class="d-none d-lg-flex align-items-center fixed-top topbar-inner-pages">
    <div class="container d-flex align-items-center">
      <div class="contact-info mr-auto">
        <ul>
          <li><i class="icofont-envelope"></i><a href="mailto:contact@example.com">{{ $topheader->email }}</a></li>
          <li><i class="icofont-phone"></i> {{ $topheader->phone }} </li>
          <li><i class="icofont-clock-time icofont-flip-horizontal"></i> {{ $topheader->time }} </li>
        </ul>
      </div>
    </div>
</div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center">

      <h4 class="logo mr-auto"><a href="index.html#header" class="scrollto">{{ $topheader->website_name }}</a></h4>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html#header" class="logo mr-auto scrollto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="http://localhost:8000/#home">Home</a></li>
          <li><a href="http://localhost:8000/#about">About</a></li>
          <li><a href="http://localhost:8000/#services">Services</a></li>
          <li><a href="http://localhost:8000/#blog">Blog</a></li>
          <li><a href="http://localhost:8000/#google_product">Google_product</a></li>
          {{-- <li class="drop-down"><a href="http://localhost:8000/#google_service">Google Serive</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li class="drop-down"><a href="#">Deep Drop Down</a>
                <ul>
                  <li><a href="#">Deep Drop Down 1</a></li>
                  <li><a href="#">Deep Drop Down 2</a></li>
                  <li><a href="#">Deep Drop Down 3</a></li>
                  <li><a href="#">Deep Drop Down 4</a></li>
                  <li><a href="#">Deep Drop Down 5</a></li>
                </ul>
              </li>
              <li><a href="#">Drop Down 2</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
            </ul>
          </li> --}}
          <li><a href="http://localhost:8000/#contact">Contact</a></li>

        </ul>
      </nav><!-- .nav-menu -->

    </div>
  </header><!-- End Header -->
