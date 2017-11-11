<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ElementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('elements', function (Blueprint $table){
            $table->increments('id');
            $table->integer('WoodenID', false, true);
            $table->string('name');

            $table->integer('FurnitureID', false, true);
            $table->integer('quantity', faelse, true);
            $table->double('sizeX', 10, 2);
            $table->double('sizeY', 10, 2);
            $table->double('sizeZ', 10, 2);

            //TODO
            $table->integer('FinishID', false, true);

            $table->primary('id');

            $table->foreign('WoodenID')->references('id')->on('wooden')->onDelete('cascade');
            $table->foreign('FurnitureID')->references('id')->on('furniture')->onDelete('cascade');
            $table->foreign('FinishID')->references('id')->on('finish')->onDelete('cascade');

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
        Schema::dropForeign('WoodenID');
        Schema::dropForeign('FurnitureID');
        Schema::dropForeign('FinishID');
        Schema::drop('elements');

    }
}
