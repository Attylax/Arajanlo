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

        Schema::create('elements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('WoodenID', false, true);
            $table->string('name');

            $table->integer('FurnitureID', false, true);
            $table->integer('quantity', false, true);
            $table->double('sizeX', 10, 2);
            $table->double('sizeY', 10, 2);
            $table->double('sizeZ', 10, 2);
            $table->double('price', 10, 2);
            $table->integer('FinishID', false, true)->nullable();


            $table->foreign('WoodenID')->references('id')->on('wooden');
            $table->foreign('FurnitureID')->references('id')->on('furniture')->onDelete('cascade');
            $table->foreign('FinishID')->references('id')->on('finish');

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
        Schema::drop('elements');

    }
}
