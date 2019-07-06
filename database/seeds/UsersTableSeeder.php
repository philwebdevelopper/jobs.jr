<?php

use Illuminate\Database\Seeder;

use Faker\Generator as Faker;
use Carbon\Carbon;

class UsersTableSeeder extends Seeder
{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run(Faker $faker)
	{
		/**
		* Add admin
		*/
		DB::table('users')->insert([
			'name' => 'Marc',
			'email' => 'admin@admin.ca',
			'password' => bcrypt('123456'),
			'birth_date' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = 'now', $timezone = null),
			'max_distance' => $faker->numberBetween($min = 5, $max = 100),
			'hourly_rate' => $faker->numberBetween($min = 1, $max = 60),
			'street' => $faker->streetAddress,
			'zip_code' => $faker->postcode,
			'city' => $faker->city,
			'apartment' => $faker->numberBetween($min = 1, $max = 45),
			'longitude' => $faker->longitude($min = -180, $max = 180),
			'latitude' => $faker->latitude($min = -90, $max = 90),
			'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		/**
		* Add fakes users
		*/
		for ($i = 1; $i <= 20; $i++) {
			DB::table('users')->insert([
				'name' => $faker->firstName,
				'email' => 'user' . $i . '@user' . $i . '.ca',
				'password' => bcrypt('123456'),
				'birth_date' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = 'now', $timezone = null),
				'max_distance' => $faker->numberBetween($min = 5, $max = 100),
				'hourly_rate' => $faker->numberBetween($min = 1, $max = 60),
				'street' => $faker->streetAddress,
				'zip_code' => $faker->postcode,
				'city' => $faker->city,
				'apartment' => $faker->numberBetween($min = 1, $max = 45),
				'longitude' => $faker->longitude($min = -180, $max = 180),
				'latitude' => $faker->latitude($min = -90, $max = 90),
				'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
				'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
			]);
		}
	}

}