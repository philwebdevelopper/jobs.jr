@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-8">
			<div class="card">
				<div class="card-header">{{ __('Créer un compte entrepreneur') }}</div>

				<div class="card-body">
					<form method="POST" action="{{ route('register') }}">
						@csrf

						{{-- Nom --}}
						<div class="form-group row">
							<label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nom') }}</label>

							<div class="col-md-6">
								<input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

								@error('name')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Mot de passe --}}
						<div class="form-group row">
							<label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Mot de passe') }}</label>

							<div class="col-md-6">
								<input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

								@error('password')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Confirmation mot de passe --}}
						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							</div>
						</div>

						{{-- Date de naissance --}}
						<div class="form-group row">
							<label for="birth_date" class="col-md-4 col-form-label text-md-right">{{ __('Date de naissance') }}</label>

							<div class="col-md-6">
								<input id="birth_date" type="date" class="form-control @error('birth_date') is-invalid @enderror" name="birth_date" value="{{ old('birth_date') }}" autocomplete="birth_date" required>

								@error('birth_date')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Courriel --}}
						<div class="form-group row">
							<label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Courriel') }}</label>

							<div class="col-md-6">
								<input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" required>

								@error('email')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Adresse --}}

						{{-- Rue --}}
						<div class="form-group row">
							<label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

							<div class="col-md-6">
								<input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus>

								@error('street')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Code postal --}}
						<div class="form-group row">
							<label for="zip_code" class="col-md-4 col-form-label text-md-right">{{ __('Code postal') }}</label>

							<div class="col-md-6">
								<input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code" autofocus>

								@error('zip_code')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>


						{{-- Ville --}}
						<div class="form-group row">
							<label for="city" class="col-md-4 col-form-label text-md-right">{{ __('Ville') }}</label>
							
							<div class="col-md-6">
								<input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>

								@error('city')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Numéro appartement --}}
						<div class="form-group row">
							<label for="apartement" class="col-md-4 col-form-label text-md-right">{{ __('No. App.') }}</label>
							
							<div class="col-md-6">
								<input id="apartement" type="number" class="form-control @error('apartement') is-invalid @enderror" name="apartement" value="{{ old('apartement') }}" required autocomplete="apartement" autofocus>

								@error('apartement')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Distance max, périmètre du service --}}
						<div class="form-group row">
							<label for="max_distance" class="col-md-4 col-form-label text-md-right">{{ __('Distance de déplacement (km)') }}</label>

							<div class="col-md-6">
								<input id="max_distance" type="range" min="5" max="1000" class="form-control @error('max_distance') is-invalid @enderror" name="max_distance" value="30" required autocomplete="max_distance" onchange="updateMaxDistanceValue(this.value);">

								{{-- Affichage de la valeur --}}
								<input type="text" id="max_distance_value" value="">

								@error('max_distance')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Taux horaire --}}
						<div class="form-group row">
							<label for="hourly_rate" class="col-md-4 col-form-label text-md-right">{{ __('Taux horaire') }}</label>

							<div class="col-md-6">
								<input id="hourly_rate" type="number" class="form-control @error('hourly_rate') is-invalid @enderror" name="hourly_rate" value="15" required autocomplete="hourly_rate">

								@error('hourly_rate')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Bouton valider --}}
						<div class="form-group row mb-0">
							<div class="col-md-6 offset-md-4">
								<button type="submit" class="btn btn-primary">
									{{ __("Valider l'inscription") }}
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
