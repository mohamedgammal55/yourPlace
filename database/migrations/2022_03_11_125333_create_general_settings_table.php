<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeneralSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general_settings', function (Blueprint $table) {
            $table->id();
            $table->string('logo',500)->nullable();
            $table->string('title',500)->nullable();
            $table->text('about_us')->nullable();
            $table->string('email',500)->nullable();
            $table->string('phone',500)->nullable();
            $table->string('facebook',500)->nullable();
            $table->string('twitter',500)->nullable();
            $table->string('youtube',500)->nullable();
            $table->string('gmail',500)->nullable();
            $table->string('times',500)->nullable();
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
        Schema::dropIfExists('general_settings');
    }
}
