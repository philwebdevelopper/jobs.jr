<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
	/**
	* Run the migrations.
	*
	* @return void
	*/
	public function up()
	{
		Schema::create('users', function (Blueprint $table) {

			// Type et ID
			$table->engine = 'InnoDB';
			$table->bigIncrements('id');

			// Infos de base
			$table->string('name', 20);
			$table->string('email', 50)->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->date('birth_date')->useCurrent();

			// Infos périmètre couvert et taux horaire
			$table->integer('max_distance');
			$table->float('hourly_rate');
			

			// Adresse
			$table->string('street', 191);
			$table->string('zip_code', 191);
			$table->string('city', 191);
			$table->integer('apartment')->nullable();
			$table->double('latitude', 15, 8)->default(0);
			$table->double('longitude', 15, 8)->default(0);

			// Mot de passe / Token / Date
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();

		});
	}

	/**
	* Reverse the migrations.
	*
	* @return void
	*/
	public function down()
	{
		Schema::dropIfExists('users');
	}
}