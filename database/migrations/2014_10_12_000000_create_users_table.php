<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('profile_photo')->nullable();
            $table->boolean('status')->default(0);
            $table->string('code')->nullable();
            $table->string('advoiser_stamp')->nullable();
            $table->string('ofc_address')->nullable();
            $table->string('accountant_reg_no')->nullable();
            $table->string('acc_city')->nullable();
            $table->string('auditor_reg_no')->nullable();
            $table->string('email_pec')->nullable();
            $table->string('ofc_name')->nullable();
            $table->string('insurance_no')->nullable();
            $table->string('insurance_company')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
