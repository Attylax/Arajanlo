<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SupplierWoodenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('supplier_Wooden', function (Blueprint $table){
            $table->integer('id', true, true);
            $table->integer('supplierID', false, true);
            $table->integer('woodenID', false, true);
            $table->date('import_date');
            $table->double('purchase_price', 10, 2);
            $table->double('selling_price', 10, 2);
            $table->integer('quantity', false, true);

            $table->primary('id');
            $table->foreign('supplierID')->references('id')->on('suppliers')->onDelete('cascade');
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
        Schema::dropForeign('supplierID');
        Schema::drop('supplier_Wooden');
    }
}
