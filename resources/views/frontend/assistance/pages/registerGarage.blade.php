@extends('frontend.assistance.layouts.master')

@section('title','Sen Mecanique || Register Page')

@section('main-content')
<div class="container-fluid m-0 p-0" style="width: 100%; height: 100vh; background-color: #f8f9fa;">
    <div class="row w-100 h-100">
        <!-- Left side: Carousel section -->
        <div class="d-none d-md-block col-lg-6 h-100" style="background-color: #dc3545;">
           <div class="row w-75 pt-3 mx-auto" style="height: 70%;">
               <div id="carouselExample" class="carousel slide h-100" data-bs-ride="carousel">
                   <div class="carousel-inner h-100">
                       <div class="carousel-item active h-100">
                           <img src="{{ asset('frontend/img/mecaniciens/mecaniciens1.jpg') }}" class="d-block w-100 h-100 rounded-3 shadow-lg" alt="Mecanicien 1">
                       </div>
                       <div class="carousel-item h-100">
                           <img src="{{ asset('frontend/img/mecaniciens/mecaniciens2.jpg') }}" class="d-block w-100 h-100 rounded-3 shadow-lg" alt="Mecanicien 2">
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
               <div class="row">
                   <p class="text-light text-center my-4" style="font-size: 1.1rem;">
                       <span class="d-block text-center fs-5 fw-bold mb-3">Rejoignez la Révolution du Service Mécanique au Sénégal !</span>
                       Trouvez rapidement des mécaniciens fiables près de chez vous ou inscrivez-vous comme mécanicien pour élargir votre clientèle avec senMécanique.
                   </p>
               </div>
           </div>
        </div>

        <!-- Right side: Form section -->
        <div class="col-12 col-lg-6 h-100 d-flex flex-column justify-content-center align-items-center">
            <div class="row w-100 text-center mb-4">
                @php
                    $settings=DB::table('settings')->get();
                @endphp
                <a href="#" class="py-2 w-100">
                    <img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="Logo" style="width: 150px; height: auto;">
                </a>
            </div>

            <div class="row w-100 text-center">
                <h1 class="text-dark fw-bold mb-4">Inscription</h1>
            </div>

            <div class="row w-100">
                <form class="form" style="width: 80%; margin: auto;" method="post" action="{{ route('GarageRegister.submit') }}">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="name" class="form-label">Votre Nom<span>*</span></label>
                        <input type="text" class="form-control rounded-3 shadow-sm" name="name" id="name" placeholder="Entrez votre nom" required value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="email" class="form-label">Votre Email<span>*</span></label>
                        <input type="email" class="form-control rounded-3 shadow-sm" name="email" id="email" placeholder="Entrez votre email" required value="{{ old('email') }}">
                        @error('email')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-3">
                        <label for="password" class="form-label">Votre mot de passe<span>*</span></label>
                        <input type="password" class="form-control rounded-3 shadow-sm" name="password" id="password" placeholder="Entrez votre mot de passe" required>
                        @error('password')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <label for="password_confirmation" class="form-label">Confirmer votre mot de passe<span>*</span></label>
                        <input type="password" class="form-control rounded-3 shadow-sm" name="password_confirmation" id="password_confirmation" placeholder="Confirmez votre mot de passe" required>
                        @error('password_confirmation')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group mb-4">
                        <button type="submit" class="btn btn-danger w-100 rounded-3 py-2 shadow-sm">Suivant</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
