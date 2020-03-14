<div class="site-mobile-menu">
	<div class="site-mobile-menu-header">
	  <div class="site-mobile-menu-close mt-3">
		<span class="icon-close2 js-menu-toggle"></span>
	  </div>
	</div>
	<div class="site-mobile-menu-body"></div>
</div>
<header class="site-navbar" role="banner">
	<div class="container-fluid">
		<div class="row align-items-center">
			<!-- Search? Can't be used, we need improve this later -->
			{{-- <div class="col-12 search-form-wrap js-search-form active">
				<form method="get" action="#">
					<input type="text" id="s" class="form-control" placeholder="Search...">
					<button class="search-btn" type="submit"><span class="icon-search"></span></button>
				</form>
			</div> --}}

			<div class="col-4 site-logo">
				<a href="{{ route('ln.home.index') }}" class="text-black h2 mb-0">{{ config('cms.name') }}</a>
			</div>

			<div class="col-8 text-right">
				<nav class="site-navigation" role="navigation">
					<ul class="site-menu js-clone-nav mr-auto d-none d-lg-block mb-0">
						<li class="nav-item"><a href="{{ route('ln.home.index') }}">Home</a></li>
						<li class="js-search-toggle"><a href="#">H</a></li>
						@guest
							<li class="nav-item dropdown">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									Sign In
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="{{ route('ln.auth.redirect', 'twitter') }}" onclick="event.preventDefault(); document.querySelector('.login-form-twitter').submit();">Sign In with Twitter</a>
								<a class="dropdown-item" href="{{ route('ln.auth.redirect', 'github') }}" onclick="event.preventDefault(); document.querySelector('.login-form-github').submit();">Sign In with Github</a>
								</div>
							</li>
						@else
							<li class="nav-item dropdown">
								<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									{{ auth()->user()->username }}
								</button>
								<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
								<a class="dropdown-item" href="#">Action</a>
								<a class="dropdown-item" href="#">Another action</a>
								<div class="dropdown-divider"></div>
								<a class="dropdown-item logout" href="{{ route('ln.auth.logout') }}" onclick="event.preventDefault(); document.querySelector('.logout-form').submit();">Logout</a>
								</div>
						  	</li>
						@endguest
					</ul>
				</nav>
				<a href="#" class="site-menu-toggle js-menu-toggle text-black d-inline-block d-lg-none"><span class="icon-menu h3"></span></a>
			</div>
			
		</div>
	</div>
</header>

{{-- Auth form post --}}
@auth
<form class="logout-form" action="{{ route('ln.auth.logout') }}" method="post" style="display: none">
	@csrf
	<button type="submit">Submit</button>
</form>
@endauth

@guest
<form class="login-form-github" action="{{ route('ln.auth.redirect', 'github') }}" method="post" style="display: none">
	@csrf
	<button type="submit">Submit</button>
</form>

<form class="login-form-twitter" action="{{ route('ln.auth.redirect', 'twitter') }}" method="post" style="display: none">
	@csrf
	<button type="submit">Submit</button>
</form>
@endguest