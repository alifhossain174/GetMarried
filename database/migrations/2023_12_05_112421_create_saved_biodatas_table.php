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
        Schema::create('saved_biodatas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullabel();
            $table->unsignedBigInteger('biodata_id')->nullabel();
            $table->tinyInteger('status')->default(0)->comment("1=>Liked; 2=>Disliked");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('saved_biodatas');
    }
};
