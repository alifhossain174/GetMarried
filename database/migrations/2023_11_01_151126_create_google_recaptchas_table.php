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
        Schema::create('google_recaptchas', function (Blueprint $table) {
            $table->id();
            $table->string('recaptcha_key')->nullable();
            $table->string('recaptcha_secret')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=>Active; 0=>Not Active");
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
        Schema::dropIfExists('google_recaptchas');
    }
};
