<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->string('system_name')->nullable();
            $table->string('system_title')->nullable();
            $table->string('system_address')->nullable();
            $table->string('system_email')->nullable();
            $table->string('system_footer')->nullable();
            $table->text('system_description')->nullable();
            $table->string('system_keywords')->nullable();
            $table->string('system_author')->nullable();
            $table->string('system_logo')->nullable();
            $table->string('system_favion')->nullable();
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
        Schema::dropIfExists('system_settings');
    }
};
