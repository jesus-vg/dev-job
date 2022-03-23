<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta
		name="viewport"
		content="width=device-width, initial-scale=1"
	>
	<meta
		name="csrf-token"
		content="{{ csrf_token() }}"
	>

	<title>{{ config('app.name', 'Laravel') }}</title>

	<!-- Fonts -->
	<link
		rel="stylesheet"
		href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap"
	>

	{{-- verificar si existe la seccion de estilos --}}
	@isset($styles)
		{{ $styles }}
	@endisset

	<!-- Styles -->
	<link
		rel="stylesheet"
		href="{{ asset('css/app.css') }}"
	>

	<!-- Scripts -->
	<script
	 src="{{ asset('js/app.js') }}"
	 defer
	></script>
</head>

<body class="font-sans antialiased">
	@include('partials.messages')
	<div class="flex min-h-screen flex-col bg-gray-100">
		@include('layouts.navigation')

		<!-- Page Heading -->
		<header class="bg-gray-800 shadow">
			<div class="mx-auto max-w-7xl py-6 px-4 sm:px-6 lg:px-8">
				{{ $header }}
			</div>
		</header>

		<!-- Page Content -->
		<main
			class="my-7 mx-auto w-full max-w-7xl flex-1 px-1"
			id="app"
		>
			{{ $slot }}
		</main>

		@include('layouts.footer')
	</div>

	{{-- verificar si existe la seccion de script --}}
	@isset($scripts)
		{{ $scripts }}
	@endisset
</body>

</html>
