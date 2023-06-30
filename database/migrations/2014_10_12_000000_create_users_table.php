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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();


            $table->string('nationality')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('religion')->nullable();
            $table->string('marital_status')->nullable();
            $table->string('progress')->nullable();

            // Staff Office Details
            
            $table->date('doj')->nullable();
            $table->string('designations')->nullable();
             
            // primary Emergency Contact
            $table->string('pemer_con_name')->nullable();
            $table->string('pemer_con_relationship')->nullable();
            $table->string('pemer_con_phone')->nullable();

            //secondary Emergency Contact
            $table->string('semer_con_name')->nullable();
            $table->string('semer_con_relationship')->nullable();
            $table->string('semer_con_phone')->nullable();

            // Bank Details
            $table->string('bank_name')->nullable();
            $table->string('bank_account')->nullable();

            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('photo')->nullable();
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->text('address')->nullable();

            $table->enum('role',['admin','manager','user'])->default('user');
            $table->enum('status',['active','inactive'])->default('active');
            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
};
