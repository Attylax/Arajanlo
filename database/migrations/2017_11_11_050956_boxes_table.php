<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BoxesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('boxes', function (Blueprint $table){
            $table->integer('id')->unsigned()->autoIncrement();
            $table ->integer('ProjectID')->unsigned();

            $table->foreign('ProjectID')->references('id')->on('project')->onDelete('cascade');
            $table->primary('id');
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
        Schema::dropForeign('ProjectID');
        Schema::drop('designer');

    }
}
