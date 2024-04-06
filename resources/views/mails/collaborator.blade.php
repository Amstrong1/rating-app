<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bienvenue chez Avis Client</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        .email-container {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.05);
        }
        .email-header {
            color: #0275d8;
            margin-bottom: 20px;
        }
        .email-content {
            line-height: 1.6;
        }
        .email-footer {
            margin-top: 30px;
            text-align: center;
        }
        a {
            color: #0275d8;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
        .email-signature {
            margin-top: 50px;
            padding-top: 20px;
            border-top: 1px solid #dcdcdc;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <h3 class="email-header">Bonjour {{ $collaborator_name }},</h3>

        <div class="email-content">
            <p>Nous sommes heureux de vous compter parmi les collaborateurs de {{ $structure_name }}.</p>

            <p>Ci-dessous, veuillez trouver vos informations de connexion :</p>
            <ul>
                <li>Email : {{ $collaborator_email }}</li>
                <li>Mot de passe : {{ $newPassword }}</li>
            </ul>

            <p class="email-footer">
                Pour accéder à votre espace, veuillez cliquer sur ce lien : <a href="https://avis-client.online" target="_blank">Espace Avis Client</a>
            </p>
        </div>

        <div class="email-signature">
            Cordialement,<br>
            L'équipe Avis Client
        </div>
    </div>
</body>
</html>
