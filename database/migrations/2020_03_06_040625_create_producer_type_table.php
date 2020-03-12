<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProducerTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('producer_type', function (Blueprint $table) {
            // $table->primary('id_producer', 'id_type');
            $table->bigInteger('id_producer')->unsigned();
            $table->bigInteger('id_type')->unsigned();;
            $table->primary(array('id_producer', 'id_type'));
            $table->bigInteger('amount');
            $table->boolean('flag');
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
        Schema::dropIfExists('producer_type');
    }
}