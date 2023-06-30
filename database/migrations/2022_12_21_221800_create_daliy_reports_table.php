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
        Schema::create('daliy_reports', function (Blueprint $table) {
            $table->id();
            $table->string('staff_name')->nullable();
            $table->string('staff_id')->nullable();
            $table->string('designation')->nullable();
            $table->string('doj')->nullable();
            $table->string('report_id')->nullable();
            $table->text('report');
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
        Schema::dropIfExists('daliy_reports');
    }
};
