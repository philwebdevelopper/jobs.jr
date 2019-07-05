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
			$table->engine = 'InnoDB';
			$table->bigIncrements('id');
			$table->string('name', 20);
			$table->string('email', 50)->unique();
			$table->timestamp('email_verified_at')->nullable();
			$table->string('password');
			$table->rememberToken();
			$table->timestamps();

			// Ajout des nouvelles colonnes:
			$table->date('birth_date')->useCurrent();
			$table->integer('max_distance');
			$table->integer('hourly_rate');
			$table->BigInteger('location_id')->unsigned()->nullable()->index();
			$table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');

			//Nouvelle ajout de colonnes
			$table->double('longitude', 15, 8)->default(0);
			$table->double('latitude', 15, 8)->default(0);

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