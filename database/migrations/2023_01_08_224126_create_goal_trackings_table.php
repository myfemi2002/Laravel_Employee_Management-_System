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
        Schema::create('goal_trackings', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->foreignId('goal_type_id')->constrained('goal_types')->onDelete('cascade')->onUpdate('cascade');
            // $table->interger('goal_type_id');
            $table->string('subject')->nullable();
            $table->string('target_achievement')->nullable();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->string('progress')->nullable();
            $table->text('description')->nullable();

            $table->string('status')->nullable();
            // $table->enum('status',['active','inactive'])->default('active');
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
        Schema::dropIfExists('goal_trackings');
    }
};
