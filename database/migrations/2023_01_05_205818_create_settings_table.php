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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->string('system_name')->nullable();
            $table->string('system_title')->nullable();

            $table->string('system_address')->nullable();
            $table->string('system_email')->nullable();
            $table->string('system_footer')->nullable();
            $table->string('system_logo')->nullable();
            $table->string('system_descrption')->nullable();
            $table->string('system_keyword')->nullable();
            $table->string('system_author')->nullable();



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
        Schema::dropIfExists('settings');
    }
};
