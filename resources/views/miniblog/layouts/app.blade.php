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

	<script src="{{ asset('js/frontend/main.min.js') }}"></script>
</body>
</html>