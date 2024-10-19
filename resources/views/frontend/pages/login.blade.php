@extends('frontend.layouts.master')

@section('title','Sen Mecanique || Login Page')

@section('main-content')
    <!-- Breadcrumbs -->
    <div class="breadcrumbs">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="bread-inner">
                        <ul class="bread-list">
                            <li><a href="{{route('home')}}">Acceuil<i class="ti-arrow-right"></i></a></li>
                            <li class="active"><a href="javascript:void(0);">Connection</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Breadcrumbs -->

    <!-- Shop Login -->
    <section class="shop login section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 offset-lg-3 col-12">
                    <div class="login-form border rounded-3 shadow p-3">
                        <h2>Connection</h2>
                        <p>Veuillez vous inscrire pour passer à la caisse plus rapidement</p>
                        <!-- Form -->
                        <form class="form" method="post" action="{{route('login.submit')}}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Votre Email<span>*</span></label>
                                        <input type="email" name="email" placeholder="" required="required" value="{{old('email')}}">
                                        @error('email')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label>Votre mot de passe<span>*</span></label>
                                        <input type="password" name="password" placeholder="" required="required" value="{{old('password')}}">
                                        @error('password')
                                            <span class="text-danger">{{$message}}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group login-btn">
                                        <div class="row d-flex justify-content-between" style="width: 70%; margin:auto;">
                                            <button class="btn" type="submit">Connection</button>
                                            <a href="{{route('register.form')}}" class="btn">Inscription</a>
                                        </div>
                                        <p class="mt-2 text-center fs-2 fw-2">ou enregsitrer vous avec</p>
                                        <div class="row d-flex justify-content-between" style="width: 70%; margin:auto;">
                                            <a href="{{route('login.redirect','facebook')}}" ><i class="bi bi-facebook fa-3x text-primary"></i></a>
                                            <a href="{{route('login.redirect','github')}}" ><i class="bi bi-github fa-3x text-dark"></i></a>
                                            <a href="{{route('login.redirect','google')}}" ><i class="bi bi-google fa-3x text-danger" ></i></a>
                                        </div>
                                    </div>
                                    <div class="checkbox d-flex justify-content-between my-2" style="width: 70%; margin:auto;">
                                        <label class="checkbox-inline" for="2"><input name="news" id="2" type="checkbox">Se souvenir de moi</label>
                                        @if (Route::has('password.request'))
                                            <a class="lost-pass" href="{{ route('password.reset') }}">
                                                Mot de passe oublié ?
                                            </a>
                                        @endif
                                    </div>

                                </div>
                            </div>
                        </form>
                        <!--/ End Form -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--/ End Login -->
@endsection
@push('styles')
<style>
    .shop.login .form .btn{
        margin-right:0;
    }
    .btn-facebook{
        background:#39579A;
    }
    .btn-facebook:hover{
        background:#073088 !important;
    }
    .btn-github{
        background:#444444;
        color:white;
    }
    .btn-github:hover{
        background:black !important;
    }
    .btn-google{
        background:#ea4335;
        color:white;
    }
    .btn-google:hover{
        background:rgb(243, 26, 26) !important;
    }
</style>
@endpush
