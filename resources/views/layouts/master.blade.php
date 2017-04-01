<!DOCTYPE html>
<html>
<head>
	<title>
        @yield('title', 'Scrabblish Word Counter')
    </title>

	<meta charset='utf-8'>
    <link href="/css/style.css" type='text/css' rel='stylesheet'>

    @stack('head')

</head>
<body>

	<header>
	<img src="images/letters.jpeg" alt="picture of scrabble letters" width="300">
	</header>

	<section>
		@yield('content')
	</section>

	<footer>
		&copy; {{ date('Y') }}
	</footer>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    @stack('body')

</body>
</html>
