@extends('frontend.assistance.layouts.master2')
@section('title', 'Sen Mecanique || Assistance Home Page')
@section('main-content')
    <!-- Slider Area -->
    @if (count($banners) > 0)
        <section id="Gslider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach ($banners as $key => $banner)
                    <li data-target="#Gslider" data-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}">
                    </li>
                @endforeach

            </ol>
            <div class="carousel-inner" role="listbox">
                @foreach ($banners as $key => $banner)
                    <div class="carousel-item  {{ $key == 0 ? 'active' : '' }}">
                        <img class="first-slide" src="{{ $banner->photo }}" alt="First slide">
                        <div class="carousel-caption d-none d-md-block text-left">
                            <h1 class="wow fadeInDown">{{ $banner->title }}</h1>
                            <p style="color: white;">{!! html_entity_decode($banner->description) !!}</p>
                            <a class="btn btn-lg ws-btn wow fadeInUpBig" href="{{ route('product-grids') }}"
                                role="button">Achetez maintenant<i class="far fa-arrow-alt-circle-right"></i></i></a>
                            <a class="btn btn-lg ws-btn wow fadeInUpBig mx-2" href="{{ route('AssistanceHome') }}"
                                role="button">Trouvez en assistance<i class="far fa-arrow-alt-circle-right"></i></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#Gslider" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Précédent</span>
            </a>
            <a class="carousel-control-next" href="#Gslider" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Suivant</span>
            </a>
        </section>
    @endif
    <div class="container my-5">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Les Garages les plus proches de Vous</h2>
                </div>
            </div>
            @if ($garage_detail_geo != null)
                <div class="row">
                    @foreach ($garage_detail_geo as $garage)
                        <div class="col-md-3 my-2">
                            <div class="card garage-card rounded-0">
                                <img src="{{ asset('storage/' . $garage->logo) }}" class="w-100 p-4" style="height: 180px;"
                                    alt="Logo du garage">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size:22px;">{{ $garage->User->name }}</h5>
                                    <div class="star-rating">
                                        <ul class="rating" style="list-style: none; padding: 0; margin: 0;">
                                            @php
                                                $rate = ceil($garage->evaluation_garage->avg('note_evaluation'));
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li style="display: inline;">
                                                    @if ($rate >= $i)
                                                        <i class="fa fa-star text-danger"></i>
                                                    @else
                                                        <i class="fa fa-star-o text-danger"></i>
                                                    @endif
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <p class="card-text" style="font-size: 16px;" id="garage-description">
                                        {{ $garage->description }}</p>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-wrench text-danger"></i>
                                        </div>
                                        <div class="col-10">
                                            <p class="w-100" style="font-size: 15px;">{{ $garage->type_garage }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-calendar-check-fill text-danger"></i>
                                        </div>
                                        <div class="col-10">
                                            <p class="w-100" style="font-size: 15px;">Du {{ $garage->jour_travail }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="hover-link">
                                        <a href="{{ url("assistance/garage-detail/".$garage->id) }}" class="text-white">Voir
                                            plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row text-center">
                    <h1 class="h3 text-center text-danger">Aucun garage disponnible !</h1>
                </div>
            @endif
        </div>
    </div>
    <div class="container mb-5">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>les Garages les mieux Notés</h2>
                </div>
            </div>
            @if ($garage_detail != null)
                <div class="row">
                    @foreach ($garage_detail as $garage)
                        <div class="col-md-3 my-2">
                            <div class="card garage-card rounded-0">
                                <img src="{{ asset('storage/' . $garage->logo) }}" class="w-100 p-4" style="height: 180px;"
                                    alt="Logo du garage">
                                <div class="card-body">
                                    <h5 class="card-title" style="font-size:22px;">{{ $garage->User->name }}</h5>
                                    <div class="star-rating">
                                        <ul class="rating" style="list-style: none; padding: 0; margin: 0;">
                                            @php
                                                $rate = ceil($garage->evaluation_garage->avg('note_evaluation'));
                                            @endphp
                                            @for ($i = 1; $i <= 5; $i++)
                                                <li style="display: inline;">
                                                    @if ($rate >= $i)
                                                        <i class="fa fa-star text-danger"></i>
                                                    @else
                                                        <i class="fa fa-star-o text-danger"></i>
                                                    @endif
                                                </li>
                                            @endfor
                                        </ul>
                                    </div>
                                    <p class="card-text" style="font-size: 16px;" id="garage-description">
                                        {{ $garage->description }}</p>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-wrench text-danger"></i>
                                        </div>
                                        <div class="col-10">
                                            <p class="w-100" style="font-size: 15px;">{{ $garage->type_garage }}</p>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-2">
                                            <i class="bi bi-calendar-check-fill text-danger"></i>
                                        </div>
                                        <div class="col-10">
                                            <p class="w-100" style="font-size: 15px;">Du {{ $garage->jour_travail }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="hover-link">
                                        <a href="{{ url("assistance/garage-detail/$garage->id") }}"
                                            class="text-white">Voir
                                            plus</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <div class="row text-center">
                    <h1 class="h3 text-center text-danger">Aucun garage disponnible !</h1>
                </div>
            @endif
        </div>
    </div>
    <!-- Start Shop Blog  -->
    <section class="shop-blog section">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="section-title">
                        <h2>Notre blog</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                @if ($posts)
                    @foreach ($posts as $post)
                        <div class="col-lg-4 col-md-6 col-12">
                            <!-- Start Single Blog  -->
                            <div class="shop-single-blog">
                                <img src="{{ $post->photo }}" alt="{{ $post->photo }}">
                                <div class="content">
                                    <p class="date">{{ $post->created_at->format('d M , Y. D') }}</p>
                                    <a href="{{ route('blog.detail', $post->slug) }}"
                                        class="title">{{ $post->title }}</a>
                                    <a href="{{ route('blog.detail', $post->slug) }}" class="more-btn">Continuez à
                                        lire</a>
                                </div>
                            </div>
                            <!-- End Single Blog  -->
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- End Shop Blog  -->
    @include('frontend.layouts.ShopServicesArea')
    @include('frontend.layouts.newsletter')

@endsection


@push('styles')
    {{-- <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script>
    <script type='text/javascript' src='https://platform-api.sharethis.com/js/sharethis.js#property=5f2e5abf393162001291e431&product=inline-share-buttons' async='async'></script> --}}
    <style>
        /* Banner Sliding */
        #Gslider .carousel-inner {
            background: #000000;
            color: white;
        }

        #Gslider .carousel-inner {
            height: 550px;
        }

        #Gslider .carousel-inner img {
            width: 100% !important;
            opacity: .9;
        }

        #Gslider .carousel-inner .carousel-caption {
            top: 5%;
        }

        #Gslider .carousel-inner .carousel-caption h1 {
            font-size: 50px;
            font-weight: bold;
            line-height: 100%;
            color: #f71d1d;
        }

        #Gslider .carousel-inner .carousel-caption p {
            font-size: 18px;
            color: white;
            margin: 28px 0 28px 0;
        }

        #Gslider .carousel-indicators {
            bottom: 70px;
        }

        .single-banner {
            position: relative;
            overflow: hidden;
        }

        .content {
            position: absolute;
            bottom: 10px;
            left: 10px;
            background: rgba(0, 0, 0, 0.5);
            padding: 15px;
            border-radius: 5px;
        }

        .text-light {
            color: white;
        }

        /* Style des cartes */
        .garage-card {
            background-color: #fff;
            /* Blanc pour le fond des cartes */
            color: #000;
            /* Noir pour le texte */
            overflow: hidden;
            position: relative;
            transition: box-shadow 0.3s ease;
            /* Transition d'ombre douce */
        }

        .garage-card:hover {
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.2);
        }

        .garage-card .card-body h5 {
            color: #f71d1d;
            /* Rouge pour le titre du garage */
            font-weight: bold;
            font-size: 18px;
            /* Taille modérée du titre */
        }

        .garage-card .card-text {
            font-size: 14px;
            /* Police modérée pour le texte */
            line-height: 1.6;
        }

        /* Style du lien au survol */
        .hover-link {
            position: absolute;
            bottom: -40px;
            left: 0;
            width: 100%;
            background-color: #f71d1d;
            /* Rouge pour le fond du bouton */
            text-align: center;
            padding: 10px 0;
            transition: bottom 0.3s ease;
        }

        .garage-card:hover .hover-link {
            bottom: 0;
        }

        .hover-link a {
            font-size: 16px;
            /* Taille modérée pour le lien */
            font-weight: bold;
            color: white;
            text-decoration: none;
        }

        .hover-link a:hover {
            color: #fff;
            /* Blanc au survol du lien */
        }

        /* Police personnalisée (exemple Google Fonts) */
        body {
            font-family: 'Roboto', sans-serif;
            /* Utilisation d'une police lisible et moderne */
        }

        /* Style pour les étoiles */
        .star-rating {
            display: block;
            /* Centrer les étoiles horizontalement */
            margin-top: 10px;
            /* Espacement entre les étoiles */
        }
    </style>
@endpush

@push('scripts')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script> --}}
    <script>
        // $.ajax(
        //     url : '/assistance/api/locations',
        //     dataType:"json"
        // )
        // /*==================================================================
        var $topeContainer = $('.isotope-grid');
        var $filter = $('.filter-tope-group');

        // filter items on button click
        $filter.each(function() {
            $filter.on('click', 'button', function() {
                var filterValue = $(this).attr('data-filter');
                $topeContainer.isotope({
                    filter: filterValue
                });
            });

        });



        // init Isotope
        $(window).on('load', function() {
            var $grid = $topeContainer.each(function() {
                $(this).isotope({
                    itemSelector: '.isotope-item',
                    layoutMode: 'fitRows',
                    percentPosition: true,
                    animationEngine: 'best-available',
                    masonry: {
                        columnWidth: '.isotope-item'
                    }
                });
            });
        });

        // Get Location : wollah j'aime le JS
        document.addEventListener("DOMContentLoaded", () => {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    const latitude = position.coords.latitude;
                    const longitude = position.coords.longitude;
                    console.log(latitude)
                    console.log(longitude)
                    var csrfToken = $('meta[name="csrf-token"]').attr("content");


                    $.ajax({
                            url: '/assistance/api/locations',
                            headers: {
                                "X-CSRF-TOKEN" : csrfToken
                            },
                            dataType: 'json',
                            type: 'POST',
                            processData: false,
                            contentType: 'application/json',
                            data: JSON.stringify({"latitude":latitude, "longitude": longitude}),
                            success: function(json) {
                                console.log("ok")
                            }
                        }

                    ).don
                });

                // Envoi des coordonnées au serveur
                //     axios.post('/assistance/api/locations', {
                //             latitude,
                //             longitude
                //         })
                //         .then(response => {
                //             console.log(response.data.message);
                //         })
                //         .catch(error => console.error(error));
                // });
            }
        });

        var isotopeButton = $('.filter-tope-group button');

        $(isotopeButton).each(function() {
            $(this).on('click', function() {
                for (var i = 0; i < isotopeButton.length; i++) {
                    $(isotopeButton[i]).removeClass('how-active1');
                }

                $(this).addClass('how-active1');
            });
        });

        // Ajout d'un léger délai avant l'apparition du lien "Voir plus" au survol
        const cards = document.querySelectorAll('.garage-card');

        cards.forEach(card => {
            card.addEventListener('mouseenter', () => {
                card.querySelector('.hover-link').style.transition = 'bottom 0.4s ease';
            });

            card.addEventListener('mouseleave', () => {
                card.querySelector('.hover-link').style.transition = 'bottom 0.2s ease';
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            const textElements = document.querySelectorAll(".card-text"); // Sélectionner tous les éléments de texte

            const maxLength = 150; // Nombre maximum de caractères avant de tronquer

            textElements.forEach(function(el) {
                let originalText = el.textContent;

                if (originalText.length > maxLength) {
                    let truncatedText = originalText.substring(0, maxLength) + "...";
                    el.textContent = truncatedText; // Remplacer le texte par la version tronquée
                }
            });
        });
    </script>
    <script>
        function cancelFullScreen(el) {
            var requestMethod = el.cancelFullScreen || el.webkitCancelFullScreen || el.mozCancelFullScreen || el
                .exitFullscreen;
            if (requestMethod) { // cancel full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
        }

        function requestFullScreen(el) {
            // Supports most browsers and their versions.
            var requestMethod = el.requestFullScreen || el.webkitRequestFullScreen || el.mozRequestFullScreen || el
                .msRequestFullscreen;

            if (requestMethod) { // Native full screen.
                requestMethod.call(el);
            } else if (typeof window.ActiveXObject !== "undefined") { // Older IE.
                var wscript = new ActiveXObject("WScript.Shell");
                if (wscript !== null) {
                    wscript.SendKeys("{F11}");
                }
            }
            return false
        }
    </script>
@endpush
