<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('files', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('company_id');
            $table->string('year')->nullable();
            $table->string('fee')->nullable();
            $table->string('sdi')->nullable();
            $table->string('customer_email')->nullable();
            $table->string('opration_email')->nullable();
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('advisor_id');
            $table->unsignedBigInteger('benefit_id');
            $table->timestamps();


            $table->foreign('benefit_id')->references('id')->on('summaries')->onDelete('cascade');
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
            $table->foreign('advisor_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('files');
    }
}
