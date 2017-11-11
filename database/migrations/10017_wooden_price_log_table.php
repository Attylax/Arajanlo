<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class WoodenPriceLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('wooden_price_log', function (Blueprint $table){
            $table->integer('supplier_woodenID', false, true);
            $table->date('change_price_date');
            $table->double('sell_price', 10, 2);

            $table->primary(['supplier_woodenID', 'change_price_date']);
            $table->foreign('supplier_woodenID')->references('id')->on('supplier_wooden');
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
        Schema::dropForeign('supplier_woodemID');
        Schema::drop('wooden_price_log');

    }
}
