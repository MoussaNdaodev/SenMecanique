<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }

        .centered-row {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            display: flex;
            justify-content: space-around;
            width: 60%;
            margin: auto;
        }

        .profile-card {
            background-color: #ffffffa4;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            padding: 20px;
            /* width: 250px; */
            transition: transform 0.2s, box-shadow 0.2s;
        }

        .profile-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        .profile-avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            margin-bottom: 15px;
        }

        .profile-title {
            font-size: 24px;
            margin-bottom: 10px;
        }

        .profile-description {
            font-size: 14px;
            color: #666666;
            margin-bottom: 20px;
        }


        body{
            background-image: url("{{asset('frontend/img/assistance/assistPage/car-being-taking-care-workshop.jpg')}}");
            /* background-position:center; */
            background-size:100%;
            background-repeat: no-repeat;

        }
    </style>
</head>
<body>
    <div class="container-fluid p-0 m-0">
        <div class="row centered-row py-2 " style="width: 40%;">
            <!-- Profil Client -->
            <div class="col-12 col-md my-4 mx-2 profile-card">
                <a href="{{route("ClientLogin.form")}}" style="text-decoration: none; color:white;">
                    <img src="{{asset('frontend/img/assistance/assistPage/avatar.png')}}" alt="Client Avatar" class="profile-avatar">
                    <h1 class="profile-title">Client</h1>
                    <p class="profile-description">Accédez à des services rapides et fiables en vous inscrivant en tant que client. Trouvez facilement des mécaniciens près de chez vous.</p>
                </a>
            </div>

            {{-- <!-- Profil Mécanicien -->
            <div class="col-12 col-md my-4 mx-2 profile-card">
                <a href="mousa.html" style="text-decoration: none; color:white;">
                    <img src="{{asset('frontend/img/assistance/assistPage/avatar.png')}}" alt="Mécanicien Avatar" class="profile-avatar">
                    <h1 class="profile-title">Mécanicien</h1>
                    <p class="profile-description">Inscrivez-vous pour offrir vos services de mécanique aux clients près de chez vous et développez votre réseau professionnel.</p>
                </a>
            </div> --}}

            <!-- Profil Garage -->
            <div class="col-12 col-md my-4 mx-2 profile-card">
                <a href="{{route("GarageRegister.form")}}" style="text-decoration: none; color:white;">
                    <img src="{{asset('frontend/img/assistance/assistPage/avatar.png')}}" alt="Garage Avatar" class="profile-avatar">
                    <h1 class="profile-title">Garage</h1>
                    <p class="profile-description">Gérez votre garage en ligne, atteignez plus de clients, et offrez des services de qualité en vous inscrivant dès maintenant.</p>
                </a>
            </div>
        </div>
    </div>
</body>
</html>
