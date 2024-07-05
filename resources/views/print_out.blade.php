<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <style>
        * {
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }

        .container {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 30px;
            margin: 0;
            padding: 0;
        }

        .print-row {
            display: flex;

            justify-content: center;
            align-items: center;
            gap: 30px;
        }

        .print-thumb {
            width: 150px;
            height: 150px;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .print-thumb>img {
            max-width: 150px;
            max-height: 150px;

        }

        .print-title {
            display: flex;
            justify-content: start;
            align-items: center;
            text-align: start;
            width: 350px;
            height: 100px;
        }

        .print-qr {
            display: block;
            width: 150px;
            height: 150px;

        }

        .btn-print {
            box-shadow: none;
            border: none;
            border-radius: 10px;
            padding: 10px;
            width: 250px;

            background-color: teal;
            color: #fff;
        }

        .btn-print:hover {
            cursor: pointer;
            background-color: rgb(0, 77, 77);
        }


        @media print {
            .noprint {
                display: none;
            }
        }

        .hr {
            display: block;
            height: 2px;
            width: 100%;
            background-color: #333;
        }
    </style>
</head>

<body>
    <div class="container">

        <button class="btn-print noprint" onclick="window.print()">Print QR Code</button>
        @foreach ($modules as $module)
            <?php
            $qr_link = $module['qr_link'];
            if ($qr_link == null) {
                $qr_link = url('/qr-not-found');
            }
            ?>

            <div class="print-row">
                <div class="print-thumb">
                    <img src="{{ asset('storage/thumbnail/' . $module['thumbnail']) }}">
                </div>
                <div class="print-title">
                    <h3>{{ $module['title'] }}</h3>
                </div>
                <div class="print-qr">
                    {!! QrCode::size(150)->generate($qr_link) !!}
                </div>
            </div>
            <div class="hr"></div>
        @endforeach
    </div>
</body>
<script>
    window.onload = function() {
        window.print();
    }
</script>

</html>
