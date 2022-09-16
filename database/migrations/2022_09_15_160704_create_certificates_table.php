<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCertificatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('certificates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('file_id');
            $table->unsignedBigInteger('created_by');

            $table->text('course_data')->nullable();
            $table->string('cost_ecnomic_report')->nullable();
            $table->string('accrued_benifits')->nullable();
            $table->string('tribute_6897')->nullable();
            $table->string('tribute_6938')->nullable();
            $table->string('tribute_6939')->nullable();
            $table->string('tribute_6940')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();


            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->foreign('created_by')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('certificates');
    }
}
