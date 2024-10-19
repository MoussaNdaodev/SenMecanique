<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SEN MECANIQUE || Register Garage</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

    <style>
        body {
            background-color: #f5f5f5;
            font-family: 'Roboto', sans-serif;
        }

        .form-section {
            margin-bottom: 30px;
        }

        .form-section h5 {
            font-size: 1.2rem;
            color: #333;
            border-bottom: 2px solid #d32f2f;
            padding-bottom: 8px;
            margin-bottom: 20px;
        }

        .input-icon {
            position: relative;
        }

        .input-icon i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: #d32f2f;
        }

        .input-icon input {
            padding-left: 40px;
        }

        label {
            font-weight: bold;
            text-transform: capitalize;
            color: #333;
        }

        .file-input-container {
            border: 2px dashed #d32f2f;
            padding: 20px;
            text-align: center;
            background-color: #fff;
            margin-bottom: 20px;
            position: relative;
        }

        .file-input-container input[type="file"] {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            cursor: pointer;
        }

        .file-input-text {
            font-size: 1rem;
            color: #6c757d;
            line-height: 1.5;
        }

        .btn-subscribe {
            background-color: #d32f2f;
            border: none;
            color: #fff;
            padding: 12px 25px;
            font-size: 1rem;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        .btn-subscribe:hover {
            background-color: #b71c1c;
        }

        .container {
            max-width: 800px;
            margin-top: 30px;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-control:focus {
            border-color: #d32f2f;
            box-shadow: 0 0 0 0.2rem rgba(211, 47, 47, 0.25);
        }

        footer {
            margin-top: 50px;
            text-align: center;
            font-size: 0.9rem;
            color: #777;
        }

        #image-preview img,
        #logo-preview img {
            max-width: 25%;
            height: auto;
            border: 1px solid #ddd;
            padding: 5px;
        }
    </style>

</head>

<body style="background-image: url({{asset('frontend/img/assistance/assistPage/car-being-taking-care-workshop.jpg')}});">
    <div class="container-fluid mt-2" style="width:80%;">
        <div class="card">
            <div class="row text-center mb-4">
                <img src="{{asset('frontend/img/favicon.png')}}" style="width: 150px;" alt="logo de l'entreprise" class="mx-auto">
            </div>

            <h1 class="text-center mb-4" style="color: #d32f2f;">Inscription Garage (complétez vos informations)</h1>

            <form action="{{ route('GarageRegister2.submit') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-section">
                    <h5>Logo et Photos du Garage</h5>
                    <div class="row">
                        <div class="col-md-6">
                            <label for="logo_garage" class="form-label">Logo du Garage</label>
                            <div class="file-input-container">
                                <input type="file" id="logo_garage" name="logo_garage" accept="image/*" onchange="previewLogo()">
                                <div class="file-input-text">
                                    Déposez votre logo ici ou cliquez pour télécharger
                                </div>
                                <div id="logo-preview" class="mt-3"></div> <!-- Zone d'affichage du logo -->
                            </div>
                        </div>

                        <div class="col-md-6">
                            <label for="garage_images" class="form-label">Photos du Garage (facultatif)</label>
                            <div class="file-input-container">
                                <input type="file" id="garage_images" name="garage_images[]" accept="image/*" multiple onchange="previewImages()">
                                <div class="file-input-text">
                                    Déposez les photos de votre garage ici ou cliquez pour télécharger
                                </div>
                                <div id="image-preview" class="mt-3"></div> <!-- Zone d'affichage des images -->
                            </div>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <h5>Informations du Garage</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="type_garage" class="form-label">Type de Garage</label>
                            <select id="type_garage" name="type_garage" class="form-select" required>
                                <option value="">Sélectionnez le type de garage</option>
                                <option value="Garage de réparation automobile">Garage de réparation automobile</option>
                                <option value="Garage de carrosserie">Garage de carrosserie</option>
                                <option value="Garage de mécanique rapide">Garage de mécanique rapide</option>
                                <option value="Garage spécialisé">Garage spécialisé</option>
                                <option value="Garage de motos">Garage de motos</option>
                                <option value="Garage de poids lourds">Garage de poids lourds</option>
                                <option value="Garage multi-services">Garage multi-services</option>
                                <option value="Garage de concessionnaire">Garage de concessionnaire</option>
                                <option value="Station-service avec garage">Station-service avec garage</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="telephone" class="form-label">Téléphone</label>
                            <input type="text" class="form-control" id="telephone" name="telephone" required>
                        </div>
                        <div class="col-md-6">
                            <label for="jour_travail" class="form-label">Jour de travail</label>
                            <select id="jour_travail" name="jour_travail" class="form-select" required>
                                <option value="">Sélectionnez les jours de travail</option>
                                <option value="Lundi au vendredi">Lundi au vendredi</option>
                                <option value="Lundi au samedi">Lundi au samedi</option>
                                <option value="Lundi au dimanche">Lundi au dimanche</option>
                                <option value="Jours fériés">Jours fériés</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="nombre_mécanicien" class="form-label">Nombre de mécaniciens</label>
                            <input type="number" class="form-control" id="nombre_mécanicien" name="nombre_mécanicien">
                        </div>
                        <div class="col-12">
                            <label for="service_garage" class="form-label">Service proposé</label>
                            <select id="service_garage" name="service_garage" class="form-select" required>
                                <option value="">Sélectionnez le service proposé</option>
                                <option value="Entretien régulier (vidange, filtres, etc.)">Entretien régulier (vidange, filtres, etc.)</option>
                                <option value="Réparation de freins">Réparation de freins</option>
                                <option value="Réparation de la suspension">Réparation de la suspension</option>
                                <option value="Diagnostic électronique">Diagnostic électronique</option>
                                <option value="Réparation de la climatisation">Réparation de la climatisation</option>
                                <option value="Réparation de l'échappement">Réparation de l'échappement</option>
                                <option value="Carrosserie (redressage, peinture)">Carrosserie (redressage, peinture)</option>
                                <option value="Réparation de la transmission">Réparation de la transmission</option>
                                <option value="Changement de pneus">Changement de pneus</option>
                                <option value="Alignement des roues">Alignement des roues</option>
                                <option value="Services électriques (batteries, alternateurs)">Services électriques (batteries, alternateurs)</option>
                                <option value="Remplacement de pare-brise">Remplacement de pare-brise</option>
                                <option value="Réparation de systèmes de direction">Réparation de systèmes de direction</option>
                                <option value="Contrôle technique">Contrôle technique</option>
                                <option value="Services de dépannage (remorquage, assistance sur route)">Services de dépannage (remorquage, assistance sur route)</option>
                                <option value="Modification de véhicules (tuning)">Modification de véhicules (tuning)</option>
                                <option value="Vente de pièces détachées">Vente de pièces détachées</option>
                            </select>
                        </div>
                        <div class="col-12">
                            <label for="description" class="form-label">Description</label>
                            <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
                        </div>
                    </div>
                </div>
                <div class="form-section">
                    <h5>Localisation</h5>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="latitude" class="form-label">Latitude</label>
                            <div class="input-icon">
                                <i class="bi bi-geo-alt"></i>
                                <input type="text" class="form-control" id="latitude" name="latitude">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="longitude" class="form-label">Longitude</label>
                            <div class="input-icon">
                                <i class="bi bi-geo-alt"></i>
                                <input type="text" class="form-control" id="longitude" name="longitude">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12">
                    <input type="hidden" name="user_garage" value="{{$user}}">
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-subscribe">Enregistrer les Informations</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; 2024 Sen Mécanique - Tous droits réservés</p>
    </footer>

    <script>
        function previewImages() {
            const preview = document.getElementById('image-preview');
            preview.innerHTML = ''; // Clear existing previews

            const files = document.getElementById('garage_images').files;

            for (let i = 0; i < files.length; i++) {
                const file = files[i];
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail');
                    preview.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        }

        function previewLogo() {
            const preview = document.getElementById('logo-preview');
            preview.innerHTML = ''; // Clear existing previews

            const file = document.getElementById('logo_garage').files[0];

            if (file) {
                const reader = new FileReader();

                reader.onload = function (e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('img-thumbnail');
                    preview.appendChild(img);
                }

                reader.readAsDataURL(file);
            }
        }
    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            console.log('Dropzone est chargé');
            function obtenirLocalisation() {
                if (navigator.geolocation) {
                    navigator.geolocation.getCurrentPosition(function (position) {
                        var latitude = position.coords.latitude;
                        var longitude = position.coords.longitude;

                        document.getElementById('latitude').value = latitude;
                        document.getElementById('longitude').value = longitude;
                    });
                }
            }

            obtenirLocalisation();
        });
    </script>
</body>

</html>
