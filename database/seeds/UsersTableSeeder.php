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
		* Add fake admin
		*/
		DB::table('users')->insert([
			'name' => 'Admin',
			'email' => 'admin@admin.ca',
			'password' => bcrypt('123456'),
			'birth_date' => $faker->dateTimeBetween($startDate = '-100 years', $endDate = 'now', $timezone = null),
			'max_distance' => '1',
			'hourly_rate' => '12.50',
			'street' => '2 Rue des Jardins',
			'zip_code' => 'G1R 4S9',
			'city' => 'Québec',
			'latitude' => '46.8139',
			'longitude' => '-71.208',
			'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		/**
		* Add fakes users with real adresses in Québec city (fakes N. apartments)
		*/

		// Fake user 1
		DB::table('users')->insert([
			'name' => $faker->firstName,
			'email' => 'user1@user.ca',
			'password' => bcrypt('123456'),
			'birth_date' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = '-12 years', $timezone = null),
			'max_distance' => $faker->numberBetween($min = 2, $max = 10),
			'hourly_rate' => $faker->numberBetween($min = 12.50, $max = 50),
			'street' => '251 22e Rue',
			'zip_code' => 'G1L 1X5',
			'city' => 'Québec',
			// Not N. apartment -> NULL
			'apartment' => $faker->numberBetween($min = 1, $max = 10),
			'latitude' => '46.833944',
			'longitude' => '-71.238006',
			'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		// Fake user 2
		DB::table('users')->insert([
			'name' => $faker->firstName,
			'email' => 'user2@user.ca',
			'password' => bcrypt('123456'),
			'birth_date' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = '-12 years', $timezone = null),
			'max_distance' => $faker->numberBetween($min = 2, $max = 10),
			'hourly_rate' => $faker->numberBetween($min = 12.50, $max = 50),
			'street' => '192-196 Avenue Turcotte',
			'zip_code' => 'G1M 1P9',
			'city' => 'Québec',
			'apartment' => $faker->numberBetween($min = 1, $max = 10),
			'latitude' => '46.818652',
			'longitude' => '-71.254968',
			'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		// Fake user 3
		DB::table('users')->insert([
			'name' => $faker->firstName,
			'email' => 'user3@user.ca',
			'password' => bcrypt('123456'),
			'birth_date' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = '-12 years', $timezone = null),
			'max_distance' => $faker->numberBetween($min = 2, $max = 10),
			'hourly_rate' => $faker->numberBetween($min = 12.50, $max = 50),
			'street' => '455 Avenue des Oblats',
			'zip_code' => 'G1K 8P2',
			'city' => 'Québec',
			'apartment' => $faker->numberBetween($min = 1, $max = 10),
			'latitude' => '46.809604',
			'longitude' => '-71.238428',
			'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		// Fake user 4
		DB::table('users')->insert([
			'name' => $faker->firstName,
			'email' => 'user4@user.ca',
			'password' => bcrypt('123456'),
			'birth_date' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = '-12 years', $timezone = null),
			'max_distance' => $faker->numberBetween($min = 2, $max = 10),
			'hourly_rate' => $faker->numberBetween($min = 12.50, $max = 50),
			'street' => '1035 Rue des Parlementaires',
			'zip_code' => 'G1A 1A3',
			'city' => 'Québec',
			// Not N. apartment -> NULL
			'latitude' => '46.809129',
			'longitude' => '-71.214742',
			'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		// Fake user 5
		DB::table('users')->insert([
			'name' => $faker->firstName,
			'email' => 'user5@user.ca',
			'password' => bcrypt('123456'),
			'birth_date' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = '-12 years', $timezone = null),
			'max_distance' => $faker->numberBetween($min = 2, $max = 10),
			'hourly_rate' => $faker->numberBetween($min = 12.50, $max = 50),
			'street' => '898 Rue d\'Hedleyville',
			'zip_code' => 'G1J 2W3',
			'city' => 'Québec',
			'apartment' => $faker->numberBetween($min = 1, $max = 10),
			'latitude' => '46.823637',
			'longitude' => '-71.220035',
			'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);

		// Fake user 6
		DB::table('users')->insert([
			'name' => $faker->firstName,
			'email' => 'user6@user.ca',
			'password' => bcrypt('123456'),
			'birth_date' => $faker->dateTimeBetween($startDate = '-18 years', $endDate = '-12 years', $timezone = null),
			'max_distance' => $faker->numberBetween($min = 2, $max = 10),
			'hourly_rate' => $faker->numberBetween($min = 12.50, $max = 50),
			'street' => '685 Avenue Plante',
			'zip_code' => 'G1M 2Z6',
			'city' => 'Québec',
			'apartment' => $faker->numberBetween($min = 1, $max = 10),
			'latitude' => '46.825824',
			'longitude' => '-71.263351',
			'created_at' => $faker->dateTime()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
	}

}