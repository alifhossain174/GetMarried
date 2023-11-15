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
        Schema::create('homepage_bio_data', function (Blueprint $table) {
            $table->id();
            $table->string('background_color')->nullable();
            $table->string('image')->nullable();
            $table->string('title')->nullable();
            $table->string('title_bn')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_bn')->nullable();

            $table->string('button1_text')->nullable();
            $table->string('button1_text_bn')->nullable();
            $table->string('button1_url')->nullable();

            $table->string('button2_text')->nullable();
            $table->string('button2_text_bn')->nullable();
            $table->string('button2_url')->nullable();

            $table->tinyInteger('status')->default(1)->comment("1=>Active; 0=>Inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homepage_bio_data');
    }
};
