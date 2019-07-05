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

						{{-- NOM --}}
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

						{{-- MOT DE PASSE --}}
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

						{{-- CONFIRMATION MOT DE PASSE --}}
						<div class="form-group row">
							<label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirmer le mot de passe') }}</label>

							<div class="col-md-6">
								<input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
							</div>
						</div>

						{{-- DATE DE NAISSANCE --}}
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

						{{-- COURRIEL --}}
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

						{{-- ADRESSE --}}
						{{-- Rue --}}
						<div class="form-group row">
							<label for="street" class="col-md-4 col-form-label text-md-right">{{ __('Adresse') }}</label>

							<div class="col-md-6">
								<input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street">

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
								<input id="zip_code" type="text" class="form-control @error('zip_code') is-invalid @enderror" name="zip_code" value="{{ old('zip_code') }}" required autocomplete="zip_code">

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
								<input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city">

								@error('city')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- Numéro appartement --}}
						<div class="form-group row">
							<label for="apartment" class="col-md-4 col-form-label text-md-right">{{ __('No. App.') }}</label>
							
							<div class="col-md-6">
								<input id="apartment" type="number" class="form-control @error('apartment') is-invalid @enderror" name="apartment" value="{{ old('apartment') }}" autocomplete="apartment">

								@error('apartment')
									<span class="invalid-feedback" role="alert">
										<strong>{{ $message }}</strong>
									</span>
								@enderror
							</div>
						</div>

						{{-- DISTANCE MAX, PÉRIMÈTRE DU SERVICE --}}
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

						{{-- SERVICES --}}
						<div class="form-group">
							<p>Service(s) offert</p>
							<div class="d-flex justify-content-around">
								{{-- Gardiennage --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="gardiennage">{{ __('Gardiennage') }}</label>
									<input id="gardiennage" type="checkbox" class="form-control @error('services') is-invalid @enderror" name="gardiennage" value="gardiennage" autocomplete="services">
								</div>
								{{-- Déneigement --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="deneigement">{{ __('Déneigement') }}</label>
									<input id="deneigement" type="checkbox" class="form-control @error('services') is-invalid @enderror" name="deneigement" value="deneigement" autocomplete="services">
								</div>
								{{-- Peinture --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="peinture">{{ __('Peinture') }}</label>
									<input id="peinture" type="checkbox" class="form-control @error('services') is-invalid @enderror" name="peinture" value="peinture" autocomplete="services">
								</div>
								{{-- Entretien paysager --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="entretien">{{ __('Entretien paysager') }}</label>
									<input id="entretien" type="checkbox" class="form-control @error('services') is-invalid @enderror" name="entretien" value="entretien" autocomplete="services">
								</div>
							</div>
							@error('services')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						{{-- DISPONIBILITÉS --}}
						<div class="form-group">
							<p>Plage des disponibilités</p>
							<div class="d-flex justify-content-around">
								{{-- Lundi --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="lundi">{{ __('Lundi') }}</label>
									<input id="lundi" type="checkbox" class="form-control @error('availability') is-invalid @enderror" name="lundi" value="lundi" autocomplete="availability">
								</div>
								{{-- Mardi --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="mardi">{{ __('Mardi') }}</label>
									<input id="mardi" type="checkbox" class="form-control @error('availability') is-invalid @enderror" name="mardi" value="mardi" autocomplete="availability">
								</div>
								{{-- Mercredi --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="mercredi">{{ __('Mercredi') }}</label>
									<input id="mercredi" type="checkbox" class="form-control @error('availability') is-invalid @enderror" name="mercredi" value="mercredi" autocomplete="availability">
								</div>
								{{-- Jeudi --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="jeudi">{{ __('Jeudi') }}</label>
									<input id="jeudi" type="checkbox" class="form-control @error('availability') is-invalid @enderror" name="jeudi" value="jeudi" autocomplete="availability">
								</div>
								{{-- Vendredi --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="vendredi">{{ __('Vendredi') }}</label>
									<input id="vendredi" type="checkbox" class="form-control @error('availability') is-invalid @enderror" name="vendredi" value="vendredi" autocomplete="availability">
								</div>
								{{-- Samedi --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="samedi">{{ __('Samedi') }}</label>
									<input id="samedi" type="checkbox" class="form-control @error('availability') is-invalid @enderror" name="samedi" value="samedi" autocomplete="availability">
								</div>
								{{-- Dimanche --}}
								<div class="d-flex flex-column">
									<label class="col-form-label" for="dimanche">{{ __('Dimanche') }}</label>
									<input id="dimanche" type="checkbox" class="form-control @error('availability') is-invalid @enderror" name="dimanche" value="dimanche" autocomplete="availability">
								</div>
							</div>
							@error('availability')
								<span class="invalid-feedback" role="alert">
									<strong>{{ $message }}</strong>
								</span>
							@enderror
						</div>

						{{-- TAUX HORAIRE --}}
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

						{{-- BOUTON VALIDER --}}
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
