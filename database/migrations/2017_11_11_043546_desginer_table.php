<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DesginerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('designer', function (Blueprint $table){
            $table->string( 'cnp');
            $table->string('name');
            $table->date('hired_date');
            $table->string('manager_cnp');

            $table->foreign('manager_cnp')->references('cnp')->on('desgienr')->onDelete('cascade');
            $table->primary('cnp');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropForeign('manager_cnp');
        Schema::drop('designer');
    }
}
