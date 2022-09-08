<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('created_by');
            $table->string('contact_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('vat_number');
            $table->string('company_address')->nullable();
            $table->string('country')->nullable();
            $table->string('email_address')->nullable();
            $table->string('phone_number')->nullable();
            $table->string('region')->nullable();
            $table->string('ateco_code')->nullable();
            $table->string('creditsafe_rating')->nullable();
            $table->string('credit')->nullable();
            $table->string('company_administrator')->nullable();
            $table->string('sdi')->nullable();
            $table->timestamps();

            // $table->foreign('benefit_id')->references('id')->on('summaries')->onDelete('cascade');
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
        Schema::dropIfExists('companies');
    }
}
