<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DesignerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('designer', function (Blueprint $table) {
            $table->string('cnp', 14);
            $table->string('name');
            $table->date('hired_date');
            $table->string('manager_cnp', 14);
            $table->string('password', 100);

            $table->primary('cnp');
            $table->foreign('manager_cnp')->references('cnp')->on('designer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('designer');
    }
}
