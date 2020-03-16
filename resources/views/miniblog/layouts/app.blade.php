<!DOCTYPE html>
<html lang="en">
<head>
	<title>{!! (isset($title) ? $title . ' - ' : '') . config('cms.name', 'LaNyerat') !!}</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<link href="https://fonts.googleapis.com/css?family=Muli:300,400,700|Playfair+Display:400,700,900" rel="stylesheet">

	<link rel="stylesheet" href="{{ asset('ln-content/themes/miniblog/assets/fonts/icomoon/style.css') }}">
	<link rel="stylesheet" href="{{ asset('css/frontend/main.min.css') }}">
</head>
<body>

		<div class="site-wrap">
			@yield('content')
		</div>

  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/jquery-3.3.1.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/jquery-migrate-3.0.1.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/jquery-ui.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/popper.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/bootstrap.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/owl.carousel.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/jquery.stellar.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/jquery.countdown.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/jquery.magnific-popup.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/bootstrap-datepicker.min.js') }}"></script> --}}
  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/aos.js') }}"></script> --}}

  {{-- <script src="{{ asset('ln-content/themes/miniblog/assets/js/main.js') }}"></script> --}}
	<script src="{{ asset('js/frontend/main.min.js') }}"></script>
</body>
</html>