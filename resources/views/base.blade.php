<!doctype html> 
<html lang="{{ App::getLocale() }}" style= "background: blue"> 
<head>     
<meta charset="utf-8">     
<meta name="HandheldFriendly" content="true">     
<meta name="MobileOptimized" content="width">     
<meta name="viewport"               
  content="width=device-width, initial-scale=1.0, shrink-to-fit=no">   
  <title>@yield('title')</title>
  @push('styles')
  <link
  rel="stylesheet"
  href="{{ asset('css/bootstrap.min.css') }}"
  >
  <link
  rel="stylesheet"
  href="{{ asset('css/footer.css') }}"
  >
  @endpush
{{-- выводим стек со стилями css --}}    
@stack('styles')   
  </head>
  <body style= "background: red">
  <div class="container">
	<header class="row">
		<h1>@yield('title')</h1> 
	</header>
	<div class="bg-success row">
		<nav class="col-3"><p>Меню</p></nav>
		<main class="col-9">@yield('content')</main>
	</div>
	<footer class="bg-warning row">&copy; Руднев Ю.Ю., 2019</footer>
</div>
</body>
</html> 




