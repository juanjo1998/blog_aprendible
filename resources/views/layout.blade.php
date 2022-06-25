<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<title>@yield('meta-title',config('app.name').' | Home')</title>
	<meta name="description" content="@yield('meta-description','Sitio web J2Dev. En este espacio puedes encontrar información acerca de mis proyectos, blog, e información para que te contactes conmigo.')">
{{-- 	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous"> --}}
	<link rel="stylesheet" href="{{asset('css/framework.css')}}">
	<link rel="stylesheet" href="{{asset('css/style.css')}}">
	<link rel="stylesheet" href="{{asset('css/responsive.css')}}">
	<link rel="stylesheet" href="{{asset('css/common.css')}}">
	<link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">

	{{-- stack css --}}

	@stack('css')
	
	<script src="https://kit.fontawesome.com/be57f6571a.js" crossorigin="anonymous"></script>
	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>


	
</head>
<body>
	<div class="preload"></div>
	<header class="space-inter">
		<div class="container container-flex space-between">
			<figure class="logo"><img src="img/logo.png" alt=""></figure>
			<nav class="custom-wrapper" id="menu">
				<div class="pure-menu"></div>
				<ul class="container-flex list-unstyled">
					<li class="nav-item"><a href="{{route('home')}}" class="text-uppercase nav-link 
						@routeIs('home') active @endif
						">Home</a></li>
					<li class="nav-item"><a href="about.html" class="text-uppercase nav-link">About</a></li>
					<li class="nav-item"><a href="archive.html" class="text-uppercase nav-link">Archive</a></li>
					<li class="nav-item"><a href="contact.html" class="text-uppercase nav-link">Contact</a></li>
				</ul>
			</nav>
		</div>
	</header>

    {{-- contenido dinamico --}}

    @yield('content')


    <section class="footer">
		<footer>
			<div class="container">
				<figure class="logo"><img src="{{asset('assets/img/logo.png')}}" alt=""></figure>
				<nav>
					<ul class="container-flex space-center list-unstyled">
						<li><a href="index.html" class="text-uppercase c-white">home</a></li>
						<li><a href="about.html" class="text-uppercase c-white">about</a></li>
						<li><a href="archive.html" class="text-uppercase c-white">archive</a></li>
						<li><a href="contact.html" class="text-uppercase c-white">contact</a></li>
					</ul>
				</nav>
				<div class="divider-2"></div>
				<p>Nunc placerat dolor at lectus hendrerit dignissim. Ut tortor sem, consectetur nec hendrerit ut, ullamcorper ac odio. Donec viverra ligula at quam tincidunt imperdiet. Nulla mattis tincidunt auctor.</p>
				<div class="divider-2" style="width: 80%;"></div>
				<p>© 2017 - Zendero. All Rights Reserved. Designed & Developed by <span class="c-white">Agencia De La Web</span></p>
				<ul class="social-media-footer list-unstyled">
					<li><a href="#" class="fb"></a></li>
					<li><a href="#" class="tw"></a></li>
					<li><a href="#" class="in"></a></li>
					<li><a href="#" class="pn"></a></li>
				</ul>
			</div>
		</footer>
	</section>

	@stack('scripts')
	
</body>
</html>