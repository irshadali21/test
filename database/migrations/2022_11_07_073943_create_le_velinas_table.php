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
            $table->text('name')->nullable();
            $table->text('title');
            $table->longText('body')->nullable();
            $table->longText('firms')->nullable();
            $table->longText('benefits')->nullable();
            $table->longText('benefits_in_number')->nullable();
            $table->longText('tax_breack')->nullable();
            $table->longText('source')->nullable();
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
