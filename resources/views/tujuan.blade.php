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
        <a class="navbar-brand" href="index.html">
          <h2>Flight With <em>YOU</em></h2>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        @auth
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item">
              <a class="nav-link" href="{{ url ('/dashboard') }}">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            @endauth
            <li class="nav-item active"><a class="nav-link" href="{{url('/tujuan')}}">Tujuan</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/promo')}}">Promo</a></li>
            <li class="nav-item"><a class="nav-link" href="{{url('/tim')}}">Tim</a></li>

            @if (Route::has('login'))
            @auth
            <li class="nav-item"><a class="nav-link" href="{{ url('/dashboard') }}">✈Back to Dashboard</a></li>
            @else
            <li class="nav-item"><a class="nav-link" href="{{ url('login') }}">✈Login</a></li>
            <li class="nav-item"><a class="nav-link" href="{{ url('register') }}">👤Register</a></li>
            @endauth
            @endif
          </ul>
        </div>
      </div>
    </nav>
  </header>


  <!-- Page Content -->
  <div class="page-heading about-heading header-text" style="background-image: url(assets/images/heading-6-1920x500.jpg);">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="text-content">
            <h4>Pesan Tiket Pesawat Anda</h4>
            <h2>Dapatkan Promo Menarik</h2>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="products">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-1-370x270.jpg" alt="">

            <div class="down-content">
              <h4>Jakarta - Bali</h4>

              <h6><small>Mulai</small> IDR1.240.000 <small>per orang</small></h6>

              <p>Terbanglah dengan Garuda Indonesia, maskapai pilihan terbaik untuk pengalaman perjalanan yang istimewa. Nikmati layanan unggul, kenyamanan, dan keamanan terbaik di udara!</p>

              <span>
                <a href="#" data-toggle="modal" data-target="#exampleModal">Pesan Sekarang</a>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-2-370x270.jpg" alt="">

            <div class="down-content">
              <h4>Jakarta - Surabaya</h4>

              <h6><small>Mulai</small> IDR1.100.000 <small>per orang</small></h6>

              <p>Jelajahi destinasi impian Anda dengan kenyamanan dan keamanan bersama Lion Air. Temukan harga terbaik untuk perjalanan Anda sekarang!</p>

              <span>
                <a href="#" data-toggle="modal" data-target="#exampleModal">Pesan Sekarang</a>
              </span>
            </div>
          </div>
        </div>

        <div class="col-md-4">
          <div class="product-item">
            <img src="assets/images/product-3-370x270.jpg" alt="">

            <div class="down-content">
              <h4>Makassar - Bali</h4>

              <h6><small>Mulai</small> IDR1.500.000 <small>per orang</small></h6>

              <p>Rencanakan perjalanan Anda dengan Citilink dan nikmati penerbangan yang nyaman dengan harga terjangkau! Temukan beragam destinasi menarik dengan layanan yang prima!</p>

              <span>
                <a href="#" data-toggle="modal" data-target="#exampleModal">Pesan Sekarang</a>
              </span>
            </div>
          </div>
        </div>

        <!-- Add more destinations as needed -->

      </div>
    </div>
  </div>

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <div class="inner-content">
            <p>Copyright © 2024 Kelompok 1</p>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Book Now</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="contact-form">
            <form action="#" id="contact">
              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Nama Lengkap" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="email" class="form-control" placeholder="Email" required="">
                  </fieldset>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Nomor Telepon" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Tanggal Keberangkatan" required="">
                  </fieldset>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Asal Kota" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Tujuan Kota" required="">
                  </fieldset>
                </div>
              </div>

              <div class="row">
                <div class="col-md-6">
                  <fieldset>
                    <input type="text" class="form-control" placeholder="Maskapai" required="">
                  </fieldset>
                </div>

                <div class="col-md-6">
                  <fieldset>
                    <input type="number" class="form-control" placeholder="Jumlah Penumpang" required="">
                  </fieldset>
                </div>
              </div>
            </form>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="button" class="btn btn-primary">Pesan</button>
        </div>
      </div>
    </div>
  </div>


  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


  <!-- Additional Scripts -->
  <script src="assets/js/custom.js"></script>
  <script src="assets/js/owl.js"></script>
</body>

</html>