<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AuxiliaryElementPriceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aux_element_price', function (Blueprint $table){
            $table->unsignedInteger("Supplier_aux_element_ID");


            $table->foreign("Supplier_aux_element_ID")
                ->references('id')->on("Supplier_aux_element")
                ->onDelete('cascade');

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
    }
}
