<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCoulmnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('code')->after('profile_photo')->nullable();
            $table->string('advoiser_stamp')->after('code')->nullable();
            $table->string('ofc_address')->after('advoiser_stamp')->nullable();
            $table->string('accountant_reg_no')->after('ofc_address')->nullable();
            $table->string('acc_city')->after('accountant_reg_no')->nullable();
            $table->string('auditor_reg_no')->after('acc_city')->nullable();
            $table->string('email_pec')->after('auditor_reg_no')->nullable();
            $table->string('ofc_name')->after('email_pec')->nullable();
            $table->string('insurance_no')->after('ofc_name')->nullable();
            $table->string('insurance_company')->after('insurance_no')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
