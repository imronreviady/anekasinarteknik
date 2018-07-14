<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">

@include('frontend.common.meta')

<body>
	<!-- Pre loader -->
	<div id="loader" class="loader">
		<div class="plane-container">
			<div class="l-s-2 blink">LOADING</div>
		</div>
	</div>

	<div id="app" class="paper-loading">

		<div class="btn-fixed-top-left">
			<a href="documentations.html" class="btn-fab  btn-primary shadow1">
				<i class="icon icon-clipboard-list"></i>
			</a>
		</div>

		<div class="page shop-single">

			<!-- Header -->
			@include('frontend.common.menu')

			@yield('content')

			@include('frontend.common.footer')

			<!-- Login modal -->
			@include('frontend.common.modalLogin')

			<!-- SignUp modal -->
			@include('frontend.common.modalSignup')

		</div>

	</div>
<!--End Page page_wrrapper -->
@include('frontend.common.scripts')

</body>
</html>