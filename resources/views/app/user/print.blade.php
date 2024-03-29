<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code</title>

    <style>
        .qr {
            width: 250px;
            height: 250px;
            margin: 0 auto;
            margin-top: 150px;
        }

        .text-center {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 50px;
        }

        th,
        td {
            padding: 10px;
        }

        th {
            background-color: #fafafa;
        }

        li {
            list-style: none;
            padding: 5px;
        }
    </style>
</head>

<body style="">

    <h1 class="text-center" style="margin: 30px">
        NOUS EPROUVONS DU PLAISIR A RECUEILLIR VOS AVIS AFIN D'AMELIORER LA QUALITE DE NOS PRESTATIONS
    </h1>

    <div class="qr" style="border: black solid 1px; padding: 5px">
        <img width="250px" src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="QR Code">
    </div>

    <div style="margin-top: 100px; padding: 10px; border: black solid 1px; border-radius: 20px">
        <div style="display: inline-block; font-size: 25px; width: 49%">
            Scannez ce code QR à l'aide de l'appareil photo de votre téléphone (smartphone) ou à partir de l'application
            Scan QR
        </div>
        <div style="display: inline-block; width: 50%; margin: 0 auto; position: relative; top: 35px; left: 40px">
            <img src="img/qrscan.jpg" alt="qrscan">
        </div>
    </div>
    <p style="text-align: right; font-style: italic; font-size: 24px">
        Nous vous remercions !
    </p>
</body>

</html>
