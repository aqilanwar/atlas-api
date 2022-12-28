<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('phone_number')->nullable();
            $table->date('dob')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->string('parents_name')->nullable();
            $table->string('parents_phone_number')->nullable();
            $table->string('parents_address')->nullable();
            $table->boolean('updated_profile')->default(0);
            $table->boolean('registered_course')->default(0);
            $table->boolean('account_active')->default(1);
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
        Schema::dropIfExists('students');
    }
};
