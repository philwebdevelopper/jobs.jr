<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'street', 'zip_code', 'city', 'apartment', 'user_id'
	];

	/**
	* Relationships between tables
	*/
	public function users() {
		return $this->hasOne(User::class);
	}
}
