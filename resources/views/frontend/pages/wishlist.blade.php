@extends('frontend.layouts.master')
@section('title','Wishlist Page')
@section('main-content')
	<!-- Breadcrumbs -->
	<div class="breadcrumbs">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="bread-inner">
						<ul class="bread-list">
							<li><a href="{{('home')}}">Acceuil<i class="ti-arrow-right"></i></a></li>
							<li class="active"><a href="javascript:void(0);">Liste de souhait</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Breadcrumbs -->

	<!-- Shopping Cart -->
	<div class="shopping-cart section">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<!-- Shopping Summery -->
					<table class="table shopping-summery">
						<thead>
							<tr class="main-hading">
								<th>PRODUIT</th>
								<th>NOM</th>
								<th class="text-center">TOTAL</th>
								<th class="text-center">AJOUTER AU PANIER</th>
								<th class="text-center"><i class="ti-trash remove-icon"></i></th>
							</tr>
						</thead>
						<tbody>
							@if(\App\Http\Helper::getAllProductFromWishlist())
								@foreach(\App\Http\Helper::getAllProductFromWishlist() as $key=>$wishlist)
									<tr>
										@php
											$photo=explode(',',$wishlist->product['photo']);
										@endphp
										<td class="image" data-title="No"><img src="{{$photo[0]}}" alt="{{$photo[0]}}"></td>
										<td class="product-des" data-title="Description">
											<p class="product-name"><a href="{{route('product-detail',$wishlist->product['slug'])}}">{{$wishlist->product['title']}}</a></p>
											<p class="product-des">{!!($wishlist['summary']) !!}</p>
										</td>
										<td class="total-amount" data-title="Total"><span>${{$wishlist['amount']}}</span></td>
										<td><a href="{{route('add-to-cart',$wishlist->product['slug'])}}" class='btn text-white'>Ajoutez au panier</a></td>
										<td class="action" data-title="Remove"><a href="{{route('wishlist-delete',$wishlist->id)}}"><i class="ti-trash remove-icon"></i></a></td>
									</tr>
								@endforeach
							@else
								<tr>
									<td class="text-center">
										Il n'y a aucune liste de souhaits disponible. <a href="{{route('product-grids')}}" style="color:blue;">Continuez vos achats</a>
									</td>
								</tr>
							@endif


						</tbody>
					</table>
					<!--/ End Shopping Summery -->
				</div>
			</div>
		</div>
	</div>
	<!--/ End Shopping Cart -->

	<!-- Start Shop Services Area  -->
	@include("frontend.layouts.ShopServicesArea")
	<!-- End Shop Newsletter -->

	@include('frontend.layouts.newsletter')

@endsection
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush
