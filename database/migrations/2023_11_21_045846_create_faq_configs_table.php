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
        Schema::create('faq_configs', function (Blueprint $table) {
            $table->id();
            $table->string('section_title')->nullable();
            $table->string('section_title_bn')->nullable();
            $table->string('background_color')->nullable();
            $table->string('background_image')->nullable();
            $table->tinyInteger('priority')->default(1)->comment("1=>Background Image; 2=>Background Color");
            $table->tinyInteger('status')->default(1)->comment("1=>Active; 0=>Inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('faq_configs');
    }
};
