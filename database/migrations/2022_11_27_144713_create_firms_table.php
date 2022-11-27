<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFirmsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('firms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('firm_name');
            $table->string('firm_vat_no');
            $table->string('firm_type');
            $table->integer('province_id')->unsigned();
            $table->string('category');
            $table->string('phone_number');
            $table->string('firm_owner');
            $table->string('email');
            $table->string('email2');
            $table->integer('sector_id')->unsigned();
            $table->integer('ateco_id')->unsigned();
            $table->unsignedBigInteger('created_by');
            $table->timestamps();

            $table->foreign('province_id')->references('id')->on('province_tables');
            $table->foreign('sector_id')->references('id')->on('sector_tables');
            $table->foreign('ateco_id')->references('id')->on('ateco_tables');
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
        Schema::drop('firms');
    }
}
