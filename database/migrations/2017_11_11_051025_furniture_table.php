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
            $table->integer('id')->unsigned()->autoincrement();
            $table->string('name');
            $table->integer('BoxID')->unsigned();
            $table->double('sizeX')->unsigned();
            $table->double('sizeY')->usngined();
            $table->double('sizeZ')->unsigned();

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
