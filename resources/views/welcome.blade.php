<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Anyar Bootstrap Template - Index</title>
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
  <!--
  Author: Bokhtiar Toshar
  Email: Bokhtiartoshar1@gmail.com
  Company Name: BrsSoftTech@gmail.com>
  -->
</head>

<body id="home">

    @include('layouts.user.partial.header')
      <!-- ======= Hero Section ======= -->
      <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown">{{ $category->name }}</h2>
              <p class="animate__animated animate__fadeInUp">{{ $category->description }}</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>

        @foreach ($front_categories as $item)
        <div class="carousel-item">
            <div class="carousel-container">
              <h2 class="animate__animated animate__fadeInDown">{{ $item->name }}</h2>
              <p class="animate__animated animate__fadeInUp">{{ $item->description }}</p>
              <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">Read More</a>
            </div>
          </div>
        @endforeach



          <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon bx bx-chevron-left" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>

          <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon bx bx-chevron-right" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>

        </div>
    </section><!-- End Hero -->

  <main id="main">
    <section id="icon-boxes" class="icon-boxes">
        <div class="container">

          <div class="row">
              @foreach ($front_categories as $item)
              <div class="col-md-6 col-lg-3 d-flex align-items-stretch mb-5 mb-lg-0 my-4" data-aos="fade-up">
                <div class="icon-box" >
                  <div class="icon"><i class="bx bxl-dribbble"></i></div>
                  <h4 class="title">{{ $item->name }}</a></h4>
                  <p class="description">{{ $item->description }}</p>
                </div>
              </div>
              @endforeach

          </div>
        </div>
      </section><!-- End Icon Boxes Section -->

      <!-- ======= About Us Section ======= -->
      <section id="about" class="about">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>About Us</h2>
            <p>{{$about->title}}.</p>
          </div>

          <div class="row content">
          {!! $about->description !!}
          </div>

        </div>
      </section><!-- End About Us Section -->


            <!-- ======= google product Section ======= -->
            <section id="google_product" class="portfoio pricing">
                <div class="container" data-aos="fade-up">
                  <div class="section-title">
                    <h2>Our Google Product</h2>
                    <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
                  </div>

                  <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                      <ul id="portfolio-flters">
                        @foreach ($front_categories as $item)
                        <li data-filter=".{{$item->id}}">{{ $item->name }}</li>
                        @endforeach
                      </ul>
                    </div>
                  </div>

                  <div class="row portfolio-container">
                    @foreach (App\Models\Product::all() as $item)
                    <div class="col-lg-4 col-md-6 portfolio-item {{$item->category_id}}">
                      <div class="box featured">
                        <h3>{{ $item->name }}</h3>
                        <h4><sup>$</sup>{{ $item->price }}<span></span></h4>
                        <ul>
                          <li>{{ $item->menu1 }}</li>
                          <li>{{ $item->menu2 }}</li>
                          <li>{{ $item->menu3 }}</li>
                          <li>{{ $item->menu4 }}</li>
                          <li>{{ $item->menu5 }}</li>
                          <li>{{ $item->menu6 }}</li>
                          <li>{{ $item->menu7 }}</li>
                          <li>{{ $item->menu8 }}</li>
                          <li>{{ $item->menu9 }}</li>
                          <li>{{ $item->menu10 }}</li>
                          <li>{{ $item->menu11 }}</li>
                          <li>{{ $item->menu12 }}</li>
                        </ul>
                        <div class="btn-wrap">
                          <a href="#" class="btn-buy">Buy Now</a>
                        </div>
                      </div>
                      </div>
                    @endforeach
                  </div>
                </div>
              </section><!-- End google product Section -->


      <!-- ======= Services Section ======= -->
      <section id="services" class="services">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Services</h2>
            <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
          </div>

          <div class="row">
            @foreach ($front_categories as $item)
                <div class="col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
                    <div class="icon-box">
                    <i class="icofont-computer"></i>
                    <h4><a href="#">{{$item->name}}</a></h4>
                    <p>{{$item->description}}</p>
                    </div>
                </div>
            @endforeach
          </div>

        </div>
      </section><!-- End Services Section -->

      <!-- ======= Contact Section ======= -->
      <section id="contact" class="contact">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Contact Us</h2>
          </div>

          <div class="row mt-1 d-flex justify-content-end" data-aos="fade-right" data-aos-delay="100">

            <div class="col-lg-5">
              <div class="info">
                <div class="address">
                  <i class="icofont-google-map"></i>
                  <h4>Location:</h4>
                  <p>A108 Adam Street, New York, NY 535022</p>
                </div>
                <div class="email">
                  <i class="icofont-envelope"></i>
                  <h4>Email:</h4>
                  <p>{{ $topheader->email }}</p>
                </div>
                <div class="phone">
                  <i class="icofont-phone"></i>
                  <h4>Call:</h4>
                  <p>{{ $topheader->phone }}</p>
                </div>

              </div>

            </div>

            <div class="col-lg-6 mt-5 mt-lg-0"  >

              <form action="{{ url('contact/store') }}" method="post" role="form" >
                @csrf
                <div class="form-row">
                  <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                    <div class="validate"></div>
                  </div>
                  <div class="col-md-6 form-group">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                    <div class="validate"></div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" placeholder="Subject" name="subject" />
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validate"></div>
                </div>
                <div class="text-center"><button type="submit">Send Message</button></div>
              </form>

            </div>

          </div>

        </div>
      </section><!-- End Contact Section -->


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
