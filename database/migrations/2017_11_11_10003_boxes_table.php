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
            $table->integer('id', true, true);
            $table ->integer('ProjectID', false, true);
            $table->string('Name',50);
            $table->double('price', 10, 2)->default(0);//nulla
            $table->foreign('ProjectID')->references('id')->on('project')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('boxes');

    }
}
