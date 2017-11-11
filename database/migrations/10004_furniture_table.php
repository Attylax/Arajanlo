<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FurnitureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Furniture', function (Blueprint $table){
            $table->integer('id', true, true);
            $table->string('name');
            $table->integer('BoxID', false, true);
            $table->double('sizeX', 10, 2)->unsigned();
            $table->double('sizeY', 10, 2)->usngined();
            $table->double('sizeZ', 10, 2)->unsigned();

            $table->primary('id');
            $table->foreign('BoxID')->references('id')->on('Boxes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropForeign('BoxID');
        Schema::drop('Furniture');
    }
}
