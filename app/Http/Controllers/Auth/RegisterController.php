<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Location;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
	/*
	|--------------------------------------------------------------------------
	| Register Controller
	|--------------------------------------------------------------------------
	|
	| This controller handles the registration of new users as well as their
	| validation and creation. By default this controller uses a trait to
	| provide this functionality without requiring any additional code.
	|
	*/

	use RegistersUsers;

	/**
	* Where to redirect users after registration.
	*
	* @var string
	*/
	protected $redirectTo = '/home';

	/**
	* Create a new controller instance.
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware('guest');
	}

	/**
	* Get a validator for an incoming registration request.
	*
	* @param  array  $data
	* @return \Illuminate\Contracts\Validation\Validator
	*/
	protected function validator(array $data)
	{
		return Validator::make($data, [
			'name' => ['required', 'string', 'min:3', 'max:20', 'unique:users'],
			'email' => ['required', 'string', 'email', 'max:50', 'unique:users'],
			'password' => ['required', 'string', 'min:6', 'max:100', 'confirmed'],
		]);
	}

	/**
	* Create a new user instance after a valid registration.
	*
	* @param  array  $data
	* @return \App\User
	*/
	protected function create(array $data) {

// dd($data);

		Location::create([
			'street' => $data['street'],
			'zip_code' => $data['zip_code'],
			'city' => $data['city'],
			'apartment' => $data['apartment'],
		]);
		
		$idLocation = \DB::getPdo()->lastInsertId();

		$user = User::create([
			'name' => $data['name'],
			'email' => $data['email'],
			'password' => Hash::make($data['password']),
			'birth_date' => $data['birth_date'],
			'max_distance' => $data['max_distance'],
			'hourly_rate' => $data['hourly_rate'],
			'location_id' => $idLocation,
		]);

		return $user;
	}
}