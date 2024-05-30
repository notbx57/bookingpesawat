<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="icon" href="{{ asset('assets/images/favicon.ico') }}">
  <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap" rel="stylesheet">
  <title>Booking Pesawat</title>
  <!-- Bootstrap core CSS -->
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <!-- Additional CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">

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
  <div class="">
    <div class="container">
      <div class="">
        <div class="col">
          <div class="section-heading">
            <h2>Order Booking Anda</h2>
          </div>
        </div>
        <div class="">
          <div class="">
            <h4>Order Booking Anda</h4>
            <table class="table table-striped">
              @foreach ($orders as $detail)
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Nomor Telepon</th>
                  <th>Dari</th>
                  <th>Ke</th>
                  <th>Tanggal Keberangkatan</th>
                  <th>Maskapai</th>
                  <th>Jumlah Penumpang</th>
                  <th>Email</th>
                  <th>Harga Total</th>
                  <th>Status</th>
                  @if ($detail->status == 'Paid')
                  <th>Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>{{ $detail->fullname }}</td>
                  <td>{{ $detail->phonenumber }}</td>
                  <td>{{ $detail->dari }}</td>
                  <td>{{ $detail->ke }}</td>
                  <td>{{ $detail->tanggal }}</td>
                  <td>{{ $detail->maskapai }}</td>
                  <td>{{ $detail->jumlah_penumpang }}</td>
                  <td>{{ $detail->email }}</td>
                  <td>Rp. {{ number_format($detail->total_price, 0, ',', '.') }}</td>
                  <td>{{ $detail->status }}</td>
                  <td>
                    @if ($detail->status == 'Paid')
                    <a href="#" class="filled-button">Print Tiket</a>
                    @else
                    <form action="{{ route('orders.pay', $detail->id) }}" method="POST">
                      @csrf
                      <button type="submit" class="filled-button">Bayar</button>
                    </form>
                    @endif
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
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
  <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <script src="{{ asset('assets/js/owl.js') }}"></script>
</body>

</html>