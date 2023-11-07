<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            text-align: center;
        }
        h2 {
            color: #333;
        }
        p {
            color: #555;
            margin: 10px 0;
        }
        strong {
            font-weight: bold;
        }
        .container {
            background-color: #fff;
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Nouveau message de contact</h2>
        <p><strong>Nom:</strong> {{ $name }}</p>
        <p><strong>Email:</strong> {{ $email }}</p>
        <p><strong>Sujet:</strong> {{ $subject }}</p>
        <p><strong>Message:</strong></p>
        <p>{{ $contenu }}</p>
    </div>
</body>
</html>
