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
            $table->unsignedInteger("Supplier_aux_element_id");
            $table->date('date');
            $table->double("price",10,2);

            $table->foreign("Supplier_aux_element_id")
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
        Schema::drop("aux_element_price");
    }
}
