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
            $table->integer('desginerID', false, true);

            $table->primary('id');
            $table->foreign('designerID')->references('id')->on('designer');
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
        Schema::drogForeign('designerID');
        Schema::drop('project');
    }
}
