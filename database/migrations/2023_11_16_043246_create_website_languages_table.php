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
        Schema::create('website_languages', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->longText('description')->nullable();
            $table->double('serial')->default(1);
            $table->tinyInteger('status')->default(1)->comment("1=>Active; 0=>Inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('website_languages');
    }
};
