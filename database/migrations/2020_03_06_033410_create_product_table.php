<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('type')->unsigned();
            $table->foreign('type')->references('id')->on('type');
            $table->bigInteger('producer')->unsigned();
            $table->foreign('producer')->references('id')->on('producer');
            $table->bigInteger('amount');
            $table->binary('image');
            $table->string('price_input');
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
        Schema::dropIfExists('product');
    }
}
