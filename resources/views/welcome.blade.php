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
  @yield('css')
</head>

<body id="home">

    @include('layouts.user.partial.header')
      <!-- ======= Hero Section ======= -->
      <section id="hero" class="d-flex justify-cntent-center align-items-center">
        <div id="heroCarousel" class="container carousel carousel-fade" data-ride="carousel">

          <!-- Slide 1 -->
          <div class="carousel-item active">
            <div class="carousel-container">
              <img src="{{ asset('user/slider/gmail1.jpg') }}" class="d-block w-100" alt="...">
            </div>
          </div>
            <div class="carousel-item">
            <div class="carousel-container">
              <img src="{{ asset('user/slider/gmail2.jpg') }}" class="d-block w-100" alt="">
            </div>
          </div>
          <div class="carousel-item">
            <div class="carousel-container">
              <img src="{{ asset('user/slider/gmail3.png') }}" class="d-block w-100" alt="">
            </div>
          </div>




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
                  <h4 class="title"> <a href="{{ url('category/product',$item->id) }}">{{ $item->name }}</a> </h4>
                  <p class="description">
                      <ul>
                          @foreach (App\Models\SubCategory::where('category_id', $item->id)->get() as $s)
                          <li style="list-style: none"><a href="{{ url('subcategory/product',$s->id) }}">{{ $s->name }}</a></li>
                          @endforeach
                      </ul>
                  </p>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" charset="utf-8"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootbox.js/5.4.0/bootbox.min.js" charset="utf-8"></script>

@if(Session::has('insert'))
  <script type="text/javascript">
    swal("Add To Cart","Added Sucessfully...","success")
  </script>
@endif


@if(Session::has('update'))
  <script type="text/javascript">
    swal("Updated Data","Update Sucessfully...","success")
  </script>
@endif

@if(Session::has('delete'))
  <script type="text/javascript">
    swal("Delete Successfully","Delete Secessfully","success")
  </script>
@endif

@if(Session::has('order'))
  <script type="text/javascript">
    swal("Order Successfully","Order Secessfully","success")
  </script>
@endif




@if(Session::has('reset_password'))
  <script type="text/javascript">
    swal("Enter your valid Password","Dont matched the password plz inter your valid password...","success")
  </script>
@endif

<script type="text/javascript">

$(document).on("click","#delete",function(e){
e.preventDefault();
var link=$(this).attr("href");
bootbox.confirm("are you want to delete",function(confirmed){
  if(confirmed){
    window.location.href=link;
};
});
});
</script>
</body>

</html>
