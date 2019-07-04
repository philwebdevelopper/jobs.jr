<?php

use Illuminate\Database\Seeder;
use Carbon\Carbon;

class AvailabilityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('availability')->insert([
			'name' => 'Lundi',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('availability')->insert([
			'name' => 'Mardi',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('availability')->insert([
			'name' => 'Mercredi',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('availability')->insert([
			'name' => 'Jeudi',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('availability')->insert([
			'name' => 'Vendredi',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('availability')->insert([
			'name' => 'Samedi',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
		DB::table('availability')->insert([
			'name' => 'Dimanche',
			'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
			'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
		]);
    }
}
