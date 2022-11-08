<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeVelinasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('le_velinas', function (Blueprint $table) {
            $table->id();
            $table->uuid('uid');
            $table->text('name');
            $table->text('title');
            $table->longText('body');
            $table->longText('firms');
            $table->longText('benefits');
            $table->longText('benefits_in_number');
            $table->longText('tex_breack');
            $table->longText('source');
            $table->unsignedBigInteger('created_by');
            $table->string('advisor_id');
            $table->string('creation_date');
            $table->timestamps();

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
        Schema::dropIfExists('le_velinas');
    }
}
