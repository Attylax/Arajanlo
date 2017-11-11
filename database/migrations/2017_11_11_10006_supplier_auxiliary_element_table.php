<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SupplierAuxiliaryElementTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("supplier_aux_element", function (Blueprint $table){
            $table->increments("id");
            $table->unsignedInteger("supplier_id");
            $table->unsignedInteger("aux_element_id");
            $table->date("import_date");
            $table->double("import_price",10,2);
            $table->double("export_price",10,2);

            $table->foreign("supplier_id")
                ->references("id")->on("suppliers")
                ->onDelete("cascade");

            $table->foreign("aux_element_id")
                ->references("id")->on("aux_elements")
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
        Schema::drop("supplier_aux_element");
    }
}
