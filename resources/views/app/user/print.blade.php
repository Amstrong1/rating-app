<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Code</title>

    <style>
        .qr {
            width: 200px;
            height: 200px;
            margin: 0 auto;
            margin-top: 100px;
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

<body>

    <div class="qr">
        <img src="data:image/png;base64,{{ base64_encode($qrcode) }}" alt="QR Code">
    </div>
    <h3 class="text-center">
        Scannez ici pour noter cet agent.
    </h3>
    <table>
        <thead>
            <th>Sur android</th>
            <th>Sur iOS</th>
        </thead>
        <tbody>
            <tr>
                <td>
                    <ul>
                        <li>Télécharger une application de lecteur de code QR</li>
                        <li>Ouvrez l'application et scannez le code QR</li>
                    </ul>
                </td>
                <td>                    
                    <li>Ouvrez votre application de photographie et scannez le code QR</li>
                </td>
            </tr>
        </tbody>
    </table>
</body>

</html>
