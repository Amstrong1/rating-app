<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Nouveau Message sur Avis Client</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        h4 {
            color: #007bff;
            margin-top: 0;
        }
        p {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h4>Hello</h4>
        <p>Un nouveau message a été envoyé dans le forum par: <strong>{{ $auth_user_name}}</strong> de la part de <strong>{{ $structure_name }}</strong>.</p>
        <p>Consultez-le dès maintenant pour rester informé !</p>
        <p>Merci et bonne journée !</p>
    </div>
</body>
</html>
