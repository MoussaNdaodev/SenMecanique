<!DOCTYPE html>
<html lang="fr">
<head>
	@include('frontend.assistance.layouts.head')
</head>
<body class="js">

	<!-- Preloader -->
	<div class="preloader">
		<div class="preloader-inner">
			<div class="preloader-icon">
				<span></span>
				<span></span>
			</div>
		</div>
	</div>
	<!-- End Preloader -->
    <div style="position: relative;">
        @include('frontend.assistance.layouts.notification')
        @yield('main-content')
        @include('frontend.assistance.layouts.footer')
    </div>
</body>
</html>
