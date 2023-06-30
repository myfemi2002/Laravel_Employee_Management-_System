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
        Schema::create('ride_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('vehicle_id');
            $table->string('name')->nullable();
            $table->string('phone')->nullable();

            $table->text('pickup_address')->nullable();
            $table->date('pickup_date')->nullable();
            $table->string('pickup_time')->nullable();

            $table->text('dropoff_address')->nullable();

            $table->text('note')->nullable();
            $table->string('passengers_no')->nullable();

            $table->string('return_trip')->nullable();

            $table->tinyInteger('status')->default('0')->comment('0=Pending, 1=Approved, 2=Declined');

            $table->integer('created_by')->nullable();
            $table->integer('updated_by')->nullable();
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
        Schema::dropIfExists('ride_requests');
    }
};
