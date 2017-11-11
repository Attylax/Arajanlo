<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuxiliaryElementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("aux_elements", function (Blueprint $table){
           $table->increments("id");
           $table->string("name");
           $table->unsignedInteger("quantity");
           $table->unsignedInteger("furniture_id");

           $table->foreign("furniture_id")
               ->references("id")->on("furniture")
               ->onDelete("cascade");

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop("aux_elements");
    }
}
