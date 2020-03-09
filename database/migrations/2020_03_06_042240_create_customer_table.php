<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->id();
            $table->string('name');
            $table->bigInteger('gender')->unsigned();
            $table->foreign('gender')->references('id')->on('gender');

            $table->string('email');
            $table->string('address');
            $table->bigInteger('phone');
            $table->bigInteger('users')->unsigned();
            $table->foreign('users')->references('id')->on('users');
            $table->boolean('flag');
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
