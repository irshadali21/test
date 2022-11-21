<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLavelinaDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lavelina_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lavelina_id');
            $table->longText('lavelina_body')->nullable();


            $table->foreign('lavelina_id')->references('id')->on('le_velinas');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lavelina_details');
    }
}
