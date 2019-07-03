<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customer', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->bigIncrements('id');
            $table->string('first_name', 20);
            $table->string('last_name', 20);
            $table->BigInteger('phone_number');
            $table->string('email', 191)->unique();
            $table->BigInteger('location_id')->unsigned()->fixed();
            $table->BigInteger('service_id')->unsigned()->fixed();
            $table->date('date_service');
            $table->BigInteger('nb_hours');
            $table->timestamps();
        });

        Schema::table('customer', function($table) {
          $table->foreign('location_id')->references('id')->on('locations')->onDelete('cascade');
          $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('customer');
    }
}
