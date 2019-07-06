@extends('layouts.app')

<div class="flex-center position-ref full-height">
	@if (Route::has('login'))
	<div class="top-right links">
		@auth
		<a href="{{ url('/home') }}">Mon compte</a>
		@else
		<a href="{{ route('login') }}">Connexion</a>

		@if (Route::has('register'))
		<a href="{{ route('register') }}">Créer un compte</a>
		@endif
		@endauth
	</div>
	@endif

	<div class="content">
		<div class="title m-b-md">
			Jobs.jr
		</div>
	</div>
</div>
</html>
