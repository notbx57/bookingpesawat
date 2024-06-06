<!DOCTYPE html>
<html>

<head>
    <title>Invoice Tiket Pesawat</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
            color: #333;
        }

        .ticket {
            width: 90%;
            max-width: 600px;
            margin: 40px auto;
            padding: 30px;
            border: none;
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            background-color: white;
        }

        .header {
            text-align: center;
            padding: 20px 0;
            border-bottom: 2px solid #e0e0e0;
        }

        .logo {
            font-size: calc(24px + 1vw);
            font-weight: bold;
            color: #fc1703;
            margin-bottom: 10px;
        }

        .title {
            font-size: calc(18px + 0.5vw);
            color: #424242;
        }

        .details {
            margin: 30px 0;
            line-height: 1.6;
        }

        .details p {
            margin: 15px 0;
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            font-size: calc(14px + 0.2vw);
        }

        .details span:first-child {
            font-weight: bold;
            color: #616161;
            min-width: 120px;
            margin-right: 10px;
        }

        .details span:last-child {
            text-align: right;
        }

        .footer {
            text-align: center;
            padding: 20px 40px;
            margin-top: 40px;
            background-color: #ba1809;
            color: white;
            border-radius: 0 0 15px 15px;
            font-style: bold;
            font-size: calc(14px + 0.2vw);
        }

        .print-button {
            display: flex;
            justify-content: center;
            margin-top: 30px;
        }


        button {
            background-color: #ba1809;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: calc(14px + 0.2vw);
            transition: background-color 0.3s, transform 0.3s;
        }

        button:hover {
            background-color: #1565C0;
            transform: scale(1.2);
        }

        @media (max-width: 600px) {
            .ticket {
                width: 95%;
                padding: 20px;
            }

            .details p {
                flex-direction: column;
                align-items: flex-start;
            }

            .details span:last-child {
                text-align: left;
                margin-top: 5px;
            }
        }

        @media print {
            body {
                background-color: white;
            }

            .ticket {
                box-shadow: none;
                max-width: 100%;
            }

            .print-button {
                display: none;
            }
        }
    </style>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/owl.css">

</head>

<body>
    <div class="ticket">

        <div class="header">
            <h2 class="logo">FLIGHT WITH YOU</h2>
            <h1 class="title">Invoice Tiket Pesawat</h1>
            <h2>Ticket ID : <span id="ticketId"></span></h2>
        </div>
        <div class="details">
            <p><span>Nama:</span> <span>{{ $order->fullname }}</span></p>
            <p><span>Email:</span> <span>{{ $order->email }}</span></p>
            <p><span>Nomor Telepon:</span> <span>{{ $order->phonenumber }}</span></p>
            <p><span>Maskapai:</span> <span>{{ $order->maskapai }}</span></p>
            <p><span>Asal:</span> <span>{{ $order->dari }}</span></p>
            <p><span>Tujuan:</span> <span>{{ $order->ke }}</span></p>
            <p><span>Tanggal:</span> <span>{{ $order->tanggal }}</span></p>
            <p><span>Jumlah Penumpang:</span> <span>{{ $order->jumlah_penumpang }}</span></p>
            <p><span>Total Harga:</span> <span>Rp {{ number_format($order->total_price, 0, ',', '.') }}</span></p>
        </div>
        <div class="print-button">
            <button id="printButton">Print Invoice</button>
        </div>
        <div class="footer">
            <h5>Terima Kasih telah memilih <br>Flight With You <br> sebagai booking website pilihan anda.</h5>
        </div>
    </div>

    <script type="text/javascript">
        const printButton = document.getElementById('printButton');
        const ticketIdElement = document.getElementById('ticketId');

        function generateTicketId() {
            let ticketId = '';
            const characters = '0123456789';
            for (let i = 0; i < 16; i++) {
                ticketId += characters.charAt(Math.floor(Math.random() * characters.length));
            }
            return ticketId;
        }

        const generatedTicketId = generateTicketId();
        ticketIdElement.textContent = generatedTicketId;

        printButton.addEventListener('click', function() {
            window.print();
            setTimeout(function() {
                window.location.href = "{{ route('dashboard') }}";
            }, 1000);
        });
    </script>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>


    <!-- Additional Scripts -->
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/owl.js"></script>
</body>

</html>