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
        Schema::create('wesbite_theme_colors', function (Blueprint $table) {
            $table->id();
            $table->string('primary_color')->nullable();
            $table->string('secondary_color')->nullable();
            $table->string('tertiary_color')->nullable();
            $table->string('white_color_1')->nullable();
            $table->string('white_color_2')->nullable();
            $table->string('white_color_3')->nullable();
            $table->string('title_color')->nullable();
            $table->string('paragraph_color')->nullable();
            $table->string('hints_color')->nullable();
            $table->string('border_color')->nullable();
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
        Schema::dropIfExists('wesbite_theme_colors');
    }
};
