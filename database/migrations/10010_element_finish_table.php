<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ElementFinishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('element_finish', function (Blueprint $table){
            $table->integer('id', true, true);
            $table->integer('side', false, true);
            $table->integer('finishID', false, true);

            $table->primary('id');
            $table->foreign('finishID')->references('id')->on('finish');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("element_finish");
    }
}
