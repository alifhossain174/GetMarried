<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('background_image')->nullable();
            $table->string('background_color')->nullable();
            $table->string('banner_title')->nullable();
            $table->string('banner_title_bn')->nullable();
            $table->string('banner_description')->nullable();
            $table->string('banner_description_bn')->nullable();
            $table->tinyInteger('priority')->default(1)->comment("1=>Background Image; 2=>Background Color");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('banners');
    }
};
