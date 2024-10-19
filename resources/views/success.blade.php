<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'Email</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
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
            margin: 50px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #c0392b; /* Rouge */
        }
        p {
            line-height: 1.6;
            margin: 15px 0;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9em;
            color: #999;
        }
        .button {
            display: inline-block;
            background-color: #c0392b; /* Rouge */
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .button:hover {
            background-color: #a93226; /* Rouge foncé */
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Bienvenue sur SenMecanique !</h1>
        <div class="row text-center mb-4">
            <img src="{{asset('frontend/img/favicon.png')}}" style="width: 150px;" alt="logo de l'entreprise" class="mx-auto">
        </div>
        <p>Nous sommes ravis de vous compter parmi nos utilisateurs. Vous avez réussi à créer votre compte.</p>
        <p>Un email de confirmation a été envoyé à votre adresse. Vous pourrez consulter et modifier votre profil à tout moment.</p>
        <p>Merci de faire partie de notre communauté !</p>
        <p style="text-align: center;">
            <a href="/profile" class="button">Voir mon profil</a>
        </p>
        <div class="footer">
            <p>&copy; 2024 SenMecanique. Tous droits réservés.</p>
        </div>
    </div>
</body>
</html>
