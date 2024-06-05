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
    <style>
        /* Additional CSS to center the form */
        .center-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* Full viewport height */
        }
    </style>
</head>

<body>
    <!-- ****** Preloader Start ****** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ****** Preloader End ****** -->
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
                            <a class="nav-link" href="{{ url ('/dashboard') }}">Home <span class="sr-only">(current)</span>
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

    <!-- Booking Form -->
    <div class="center-form">
        <form id="bookingForm" method="POST" action="{{ route('book.flight') }}">
            @csrf
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-20">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="mb-0">Booking Tujuanmu Disini !</h4>
                                <input type="hidden" id="total_price" name="total_price" value="{{ $flight->harga }}">
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="fullname">Nama Lengkap</label>
                                            <input type="text" class="form-control" id="fullname" name="fullname" value="{{$userName}}" placeholder="Nama Lengkap" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="email" class="form-control" id="email" value="{{ $userEmail }}" name="email" placeholder="Email" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phonenumber">Nomor Telepon</label>
                                            <input type="text" class="form-control" id="phonenumber" name="phonenumber" placeholder="Nomor Telepon" required>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal Keberangkatan</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="dari">Asal Kota</label>
                                            <input type="text" class="form-control" id="dari" value="{{ $flight->dari }}" placeholder="Asal Kota" name="dari" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="ke">Tujuan Kota</label>
                                            <input type="text" class="form-control" id="ke" value="{{ $flight->ke }}" placeholder="Tujuan Kota" name="ke" required readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="maskapai">Maskapai</label>
                                            <input type="text" class="form-control" id="maskapai" value="{{ $flight->nama_maskapai }}" placeholder="Maskapai" name="maskapai" required readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jumlah_penumpang">Jumlah Penumpang</label>
                                            <input type="number" class="form-control" id="jumlah_penumpang" name="jumlah_penumpang" placeholder="Jumlah Penumpang" required min="1" max="{{ $flight->kuota_kursi }}">
                                            <small class="text-muted">Tersedia: {{ $flight->kuota_kursi }} kursi</small> <br>
                                            <small class="text-muted">Max. 10 penumpang</small>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="flight_id" value="{{ $flight->id }}">
                                <!-- Display price -->
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="text-center">Total Harga</h4>
                                        <h5 class="text-center" id="totalPrice">IDR {{ number_format($flight->harga, 0, ',', '.') }}</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-md-12 text-right">
                                        <button type="submit" class="btn btn-primary">Pesan</button>
                                        <button type="button" class="btn btn-secondary">Batal</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    @if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
    @endif

    <!-- Bootstrap core JavaScript -->
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/owl.js') }}"></script>

    <script>
        const passengerInput = document.getElementById('jumlah_penumpang');
        const totalPriceElement = document.getElementById('totalPrice');
        const totalPriceInput = document.getElementById('total_price');
        const baseFare = {{$flight -> harga}};
        const availableSeats = {{$flight -> kuota_kursi}};

        passengerInput.addEventListener('input', function() {
            const passengers = parseInt(this.value) || 0;
            const totalPrice = passengers * baseFare;
            totalPriceElement.textContent = `IDR ${totalPrice.toLocaleString('id-ID')}`;
            totalPriceInput.value = totalPrice;


            if (passengers > 10) {
                alert(`Maaf, pemesanan maksimal 10 kursi.`);
                this.value = 10;
                const totalPrice = 10 * baseFare;
                totalPriceElement.textContent = `IDR ${totalPrice.toLocaleString('id-ID')}`;
                totalPriceInput.value = totalPrice;
            }
        });

        document.getElementById('bookingForm').addEventListener('submit', function(event) {
            event.preventDefault();
            const passengers = parseInt(passengerInput.value) || 0;
            if (passengers > availableSeats) {
                alert(`Maaf, kuota kursi telah habis`);
            } else {
                alert('Pesanan anda sudah dibuat! Silakan cek "Orders" Untuk Pembayaran');
                this.submit();
            }
        });
    </script>

</body>

</html>