<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLaVelinaHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('la_velina_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lavelina_id')->unsigned();
            $table->integer('cluster_id')->unsigned();
            $table->integer('firm_id')->unsigned();
            $table->unsignedBigInteger('sent_by');
            $table->timestamps();

            $table->foreign('lavelina_id')->references('id')->on('le_velinas');
            $table->foreign('firm_id')->references('id')->on('firms');
            $table->foreign('cluster_id')->references('id')->on('la_velina_clusters');
            $table->foreign('sent_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('la_velina_histories');
    }
}
