<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSummariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('summaries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('column1')->nullable();
            $table->string('column2')->nullable();
            $table->string('column3')->nullable();
            $table->string('column4')->nullable();
            $table->string('column5')->nullable();
            $table->string('column6')->nullable();
            $table->string('column7')->nullable();
            $table->string('column8')->nullable();
            $table->string('column9')->nullable();
            $table->string('column10')->nullable();
            $table->string('column11')->nullable();
            $table->string('column12')->nullable();
            $table->string('column13')->nullable();
            $table->string('column14')->nullable();
            $table->string('column15')->nullable();
            $table->string('column16')->nullable();
            $table->string('column17')->nullable();
            $table->string('column18')->nullable();
            $table->string('column19')->nullable();
            $table->string('column20')->nullable();
            $table->string('column21')->nullable();
            $table->string('column22')->nullable();
            $table->string('column23')->nullable();
            
            //name are too long so we will add name in 1st row
            // $table->string('activity')->nullable();
            // $table->string('requirements')->nullable();
            // $table->string('tax codes')->nullable();
            // $table->string('rate of expenses attributable to 31/12/22')->nullable();
            // $table->string('maximum rate of expenses attributable to 31/12/22 (per annum)')->nullable();
            // $table->string('rate of expenses attributable from 1/1/23 to 31/12/31')->nullable();
            // $table->string('rate of expenses attributable from 1/1/23 to 31/12/31 (per annum)')->nullable();
            // $table->string('rate of expenses attributable from 1/1/23 to 31/12/23')->nullable();
            // $table->string('maximum rate of expenses attributable from 1/1/23 (per annum)')->nullable();
            // $table->string('rate of expenses attributable to 31/12/23')->nullable();
            // $table->string('maximum rate of expenses attributable to 31/12/23 (per annum)')->nullable();
            // $table->string('rate of expenses attributable from 1/1/24 to 31/12/25')->nullable();
            // $table->string('maximum rate of expenses attributable from 1/1/24 to 31/12/25 (per annum)')->nullable();
            // $table->string('type of company for F4.0 (tax code 6897)')->nullable();
            // $table->string('rate of expenses attributable from 17/5/22')->nullable();
            // $table->string('maximum rate of expenses attributable from 17/5/22')->nullable();
            // $table->string('maximum rate of expenses attributable from 17/5/22')->nullable();
            // $table->string('rate of expenses attributable to Law 50-17 / 5/22 art.22 c.1 (training carried out by bodies not accredited by the MISE before 17/5/22)')->nullable();
            // $table->string('maximum rate of expenses attributable to Law 50-17 / 5/22 art.22 c.1 (training carried out by bodies not accredited by the MISE before 17/5/22)')->nullable();
            // $table->string('rate of expenses attributable to Law 50-17 / 5/22 art.22 c.2 (training carried out by bodies not accredited by the MISE after 17/5/22)')->nullable();
            // $table->string('maximum rate of expenses attributable to Law 50-17 / 5/22 art.22 c.2 (training carried out by bodies not accredited by the MISE after 17/5/22)')->nullable();
            // $table->string('company size valid for R&D ONLY FOR INCREASE 6939 (SUD Bonus)')->nullable();
            // $table->string('rate of expenses attributable with SUD increase (tax code 6939) at 12/31/22 - Tax code 6939 to be used ONLY for companies in the South (Abruzzo, Basilicata, Calabria, Campania, Molise, Puglia, Sardinia, Sicily)')->nullable();
            // $table->string('list of regions tax code 6939')->nullable();
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
        Schema::dropIfExists('summaries');
    }
}
