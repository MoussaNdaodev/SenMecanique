@extends('frontend.assistance.layouts.master')

@section('title','Sen Mecanique || Register Page')

@section('main-content')
<div class="container-fluid m-0 p-0" style="width: 100%;height:100vh">
    <div class="row w-100 h-100">
        <div class="d-none d-md-block d-lg-block col-md-12 col-lg-6 h-100" style="background-color: red;">
           <div class="row w-75 pt-3" style="margin: auto; height:65%;">
            <div id="carouselExample" class="carousel slide" style="height: 100%;"> <!-- Carrousel prend toute la hauteur disponible -->
                <div class="carousel-inner h-100">
                    <div class="carousel-item active h-100">
                        <img src="{{asset('frontend/img/mecaniciens/mecaniciens1.jpg')}}" class="d-block w-100 h-100 rounded-3" alt="...">
                    </div>
                    <div class="carousel-item h-100">
                        <img src="{{asset('frontend/img/mecaniciens/mecaniciens2.jpg')}}" class="d-block w-100 h-100 rounded-3" alt="...">
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
                </button>
            </div>
            <div class="row ">
                <p class="text-light text-center">
                   <span class="d-block text-center fs-5 my-3" style="font-weight:bold;"> Rejoignez la Révolution du Service Mécanique au Sénégal !</span>
                    Vous avez une panne et vous ne savez pas où trouver un mécanicien fiable rapidement ? Ou bien, vous êtes un mécanicien à la recherche de nouvelles opportunités pour élargir votre clientèle ? Ne cherchez plus, notre application senMécanique est là pour vous simplifier la vie. Grâce à notre plateforme, trouvez en un clin d'œil les meilleurs mécaniciens près de chez vous, prêts à intervenir à tout moment.
                </p>
           </div>
           </div>
        </div>
        <div class="col-12 col-md-12 col-lg-6 h-100">
            <div class="row w-100 text-center">
                @php
                    $settings=DB::table('settings')->get();
                @endphp
                <a href="#" class="py-2 w-100"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"  style="width: 25%;"></a>
            </div>
            <div class="row w-100 text-center">
                <h1 class="text-center w-100" style="font-weight: bold;">Inscription</h1>
            </div>
            <div class="row w-100 my-4">
                <div class="col w-75 text-center" style="margin: auto;">
                    <a href="{{route('login.redirect','facebook')}}" class="mx-3"><i class="bi bi-facebook fa-3x text-primary"></i></a>
                    <a href="{{route('login.redirect','github')}}" class="mx-3"><i class="bi bi-github fa-3x text-dark"></i></a>
                    <a href="{{route('login.redirect','google')}}" class="mx-3"><i class="bi bi-google fa-3x text-danger" ></i></a>
                </div>
            </div>
            <div class="row w-100">
                <form class="form w-75" style="margin:auto;" method="post" action="{{route('Clientregister.submit')}}">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label>Votre Nom<span>*</span></label>
                                <input class="form-control" type="text" name="name" placeholder="" required="required" value="{{old('name')}}">
                                @error('name')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Votre Email<span>*</span></label>
                                <input class="form-control" type="text" name="email" placeholder="" required="required" value="{{old('email')}}">
                                @error('email')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Votre mot de passe<span>*</span></label>
                                <input class="form-control" type="password" name="password" placeholder="" required="required" value="{{old('password')}}">
                                @error('password')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label>Confirmer votre mot de passe<span>*</span></label>
                                <input class="form-control" type="password" name="password_confirmation" placeholder="" required="required" value="{{old('password_confirmation')}}">
                                @error('password_confirmation')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="row">
                                <div class="col text-center w-100">
                                    <button class="btn" type="submit">Inscription</button>
                                    <button class="btn"><a href="{{route('login.form')}}">Connection</a></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
