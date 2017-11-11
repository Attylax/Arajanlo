<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WoodenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('wooden', function (Blueprint $table){
            $table->integer('id', true, true);
            $table->string('name', 50);
            $table->integer('Wooden_typeID', false, true);

            $table->foreign('Wooden_typeID')->references('id')->on('wooden_type');

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
        Schema::drop('wooden');
    }
}
