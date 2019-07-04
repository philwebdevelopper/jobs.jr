<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Availability extends Model
{

	/**
	* The attributes that are mass assignable.
	*
	* @var array
	*/
	protected $fillable = [
		'name'
	];

	/**
	* Relationships between tables
	*/
	public function users() {
		return $this->belongsToMany(User::class);
	}
}