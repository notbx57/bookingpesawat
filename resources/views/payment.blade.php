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
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ config('midtrans.client_key') }}"></script>

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
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/dashboard') }}">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/tujuan') }}">Tujuan</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/promo') }}">Promo</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ url('/tim') }}">Tim</a></li>
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
    <div class="center-form">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h3><b>Bayar Pesanan untuk Order ID #{{ $order->id }}</b></h3>
                    </div>

                    <div class="card-body">
                        <p>Order Details:</p>
                        <ul>
                            <li>Full Name: {{ $order->fullname }}</li>
                            <li>Email: {{ $order->email }}</li>
                            <li>Phone Number: {{ $order->phonenumber }}</li>
                            <li>Total Price: {{ $order->total_price }}</li>
                        </ul>

                        <button id="pay-button" class="btn btn-primary">Bayar</button>
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
                        <p>Copyright © 2024 by Kelompok 1</p>
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

    <!-- Midtrans Snap.js Integration -->
    <script type="text/javascript">
        const payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function() {
            snap.pay('{{ $snapToken }}', {
                onSuccess: function(result) {
                    /* You may add your own implementation here */
                    console.log(result);
                    window.location.href = "{{ route('orders', ['user_id' => Auth::user()->id]) }}";
                },
                onPending: function(result) {
                    /* You may add your own implementation here */
                    alert("Waiting for your payment!");
                    console.log(result);
                },
                onError: function(result) {
                    alert("Payment failed!");
                    console.log(result);
                },
                onClose: function() {
                    /* You may add your own implementation here */
                    alert('You closed the popup without finishing the payment');
                }
            });
        });
    </script>
</body>

</html>