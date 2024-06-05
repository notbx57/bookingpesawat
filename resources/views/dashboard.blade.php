<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="assets/images/favicon.ico">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">

  <title>Booking Pesawat</title>

  <!-- Bootstrap core CSS -->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="assets/css/fontawesome.css">
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="preloader">
    <div class="jumper">
      <div></div>
      <div></div>
      <div></div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- Header -->
  <header class="">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="">
          <h2>Flight With <em>YOU</em></h2>
          <h6>Selamat Datang {{$user->name}}</h6>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="{{ url ('/dashboard') }}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>

            <li class="nav-item"><a class="nav-link" href="{{url('/tujuan')}}">Tujuan</a></li>
            <li class="nav-item" hidden><a class="nav-link" href="{{url('/promo')}}">Promo</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/tim')}}">Tim</a></li>

            @if (Route::has('login'))
            @auth
            <li class="nav-item">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <a href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">🚪Logout</a>
              </form>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="{{ route('orders', ['user_id' => Auth::user()->id]) }}">
                🔂Orders
              </a>
            </li>
            @else
            <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">✈Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">📟Register</a></li>
            @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>

  <!-- Page Content -->
  <!-- Banner Starts Here -->
  <div class="banner header-text">
    <div class="owl-banner owl-carousel">
      <div class="banner-item-01">
        <div class="text-content">
          <h2>BOOKING PESAWAT <p>
            <h2>SEKARANG</h2>
            </p>
          </h2>
        </div>
      </div>
      <div class="banner-item-02">
        <div class="text-content">
          <h2>Laboriosam reprehenderit ducimus</h2>
        </div>
      </div>
      <div class="banner-item-03">
        <div class="text-content">
          <h2>Quaerat suscipit unde minus dicta</h2>
        </div>
      </div>
    </div>
  </div>
  <!-- Banner Ends Here -->
  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Mau ke Mana ?</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <p>Ayo cek penerbangan hari ini siapa tahu ada promo!</p>
            <a href="{{url('/tujuan')}}" class="filled-button">Cek Tujuan Sekarang!</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>

  <div class="latest-products">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Promo</h2>
          </div>
        </div>
        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/wonderfull-bali-pura.jpg" alt=""></a>
            <div class="down-content">
              <a href="#">
                <h4>Ke Bali Lebih Murah dari CGK</h4>
              </a>
              <h6><small>hemat dari</small> Rp.899.000 <small></small></h6>
              <p>Raih liburan lebih hemat</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <a href="#"><img src="assets/images/australia.jpg" alt=""></a>
            <div class="down-content">
              <a href="#">
                <h4>Hemat Jalan - Jalan ke Luar Negeri</h4>
              </a>
              <p>Pertama kali keluar negeri ? Promo ini bisa membuat kantongmu gak gampang boncos</p>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <a href="offers.html"><img src="assets/images/lounge.jpg" alt=""></a>
            <div class="down-content">
              <a href="offers.html">
                <h4>Cuman mau nyantai di Lounge Bandara ?</h4>
              </a>
              <p>Anda berkesempatan mendapatkan Akses ke Lounge Bandara terdekat lho!</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="best-features">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>About Us</h2>
          </div>
        </div>
        <div class="col-md-6">
          <div class="left-content">
            <p>Tim kami berkomitmen untuk membuat perjalanan anda lebih mudah dan menyenangkan.</p>
            <a href="#" class="filled-button">Tim kami</a>
          </div>
        </div>
        <div class="col-md-6">
          <div class="right-image">
            <img src="assets/images/about-1-570x350.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="services" style="background-image: url(assets/images/other-image-fullscren-1-1920x900.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Latest blog posts</h2>

            <a href="blog.html">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <a href="#" class="services-item-image"><img src="assets/images/blog-1-370x270.jpg" class="img-fluid" alt=""></a>

            <div class="down-content">
              <h4><a href="#">Lorem ipsum dolor sit amet, consectetur adipisicing elit hic</a></h4>

              <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <a href="#" class="services-item-image"><img src="assets/images/blog-2-370x270.jpg" class="img-fluid" alt=""></a>

            <div class="down-content">
              <h4><a href="#">Lorem ipsum dolor sit amet consectetur adipisicing elit</a></h4>

              <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
            </div>
          </div>
        </div>
        <div class="col-lg-4 col-md-6">
          <div class="service-item">
            <a href="#" class="services-item-image"><img src="assets/images/blog-3-370x270.jpg" class="img-fluid" alt=""></a>

            <div class="down-content">
              <h4><a href="#">Aperiam modi voluptatum fuga officiis cumque</a></h4>

              <p style="margin: 0;"> John Doe &nbsp;&nbsp;|&nbsp;&nbsp; 12/06/2020 10:30 &nbsp;&nbsp;|&nbsp;&nbsp; 114</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="happy-clients">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="section-heading">
            <h2>Testimoni</h2>

            <a href="#">read more <i class="fa fa-angle-right"></i></a>
          </div>
        </div>
        <div class="col-md-12">
          <div class="owl-clients owl-carousel text-center">
            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>John Doe</h4>
                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Jane Smith</h4>
                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Antony Davis</h4>
                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>John Doe</h4>
                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Jane Smith</h4>
                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
              </div>
            </div>

            <div class="service-item">
              <div class="icon">
                <i class="fa fa-user"></i>
              </div>
              <div class="down-content">
                <h4>Antony Davis</h4>
                <p class="n-m"><em>"Lorem ipsum dolor sit amet, consectetur an adipisicing elit. Itaque, corporis nulla at quia quaerat."</em></p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <div class="call-to-action">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <div class="row">
              <div class="col-md-8">
                <h4>Lorem ipsum dolor sit amet, consectetur adipisicing.</h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Itaque corporis amet elite author nulla.</p>
              </div>
              <div class="col-lg-4 col-md-6 text-right">
                <a href="contact.html" class="filled-button">Contact Us</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright © 2024 by Kelompok 1</a></p>
          </div>
        </div>
      </div>
    </div>
  </footer>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
</body>

</html>