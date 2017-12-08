<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ProjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('project', function (Blueprint $table) {
            $table->integer('id',true, true);
            $table->string('Name');
            $table->integer('Status', false, true);
            $table->string('designer_id',14);
            $table->string('costumer');
            $table->double('price',10,2);
            $table->foreign('designer_id')->references('cnp')->on('designer')->onDelete('cascade');
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
        Schema::drop('project');
    }
}
