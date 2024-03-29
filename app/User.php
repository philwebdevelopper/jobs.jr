<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use Notifiable;

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name', 'email', 'password',
		'birth_date', 'max_distance', 'hourly_rate',
		'street', 'zip_code', 'city', 'apartment',
		'latitude', 'longitude'
	];

	/**
	* The attributes that should be hidden for arrays.
	*
	* @var array
	*/
	protected $hidden = [
		'password', 'remember_token',
	];

	/**
	* The attributes that should be cast to native types.
	*
	* @var array
	*/
	protected $casts = [
		'email_verified_at' => 'datetime',
	];

	/**
	* Relationships between tables
	*/
	public function services() {
		return $this->belongsToMany(Service::class);
	}
	public function availability() {
		return $this->belongsToMany(Availability::class);
	}
}