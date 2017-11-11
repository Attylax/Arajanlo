<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class FinishWoodenTypeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('finish_wooden_type', function (Blueprint $table){
            $table->integer('id', true, true);
            $table->integer('wooden_typeID', false, true);
            $table->integer('finishID', false, true);

            $table->primary('id');
            $table->foreign('wooden_typeID')->references('id')->on('wooden')->onDelete('cascade');
            $table->foreign("finishID")->references('id')->on('finish')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('wooden_typeID');
        Schema::drop('finish_wooden_type');
        //
    }
}
