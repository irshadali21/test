<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailTracksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_tracks', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('created_by');
            $table->string('model')->nullable();
            $table->string('model_id')->nullable();
            $table->string('date');
            $table->timestamps();

            // $table->foreign('benefit_id')->references('id')->on('summaries')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('email_tracks');
    }
}
