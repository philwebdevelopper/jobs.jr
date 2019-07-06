<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Carbon\Carbon;

class LocationsTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run(Faker $faker)
	{
		/**
		* Add fakes locations
		*/
		for ($i = 1; $i <= 21; $i++) {
			DB::table('locations')->insert([
				'street' => $faker->streetAddress,
				'zip_code' => $faker->postcode,
				'city' => $faker->city,
				'apartment' => $faker->numberBetween($min = 1, $max = 45),
				'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			]);
		}
	}
}