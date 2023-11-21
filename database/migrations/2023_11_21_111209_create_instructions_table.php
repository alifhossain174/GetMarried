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
        Schema::create('instructions', function (Blueprint $table) {
            $table->id();
            $table->string('question')->nullable();
            $table->string('question_bn')->nullable();
            $table->longText('answer')->nullable();
            $table->longText('answer_bn')->nullable();
            $table->double('serial')->default(1);
            $table->string('slug');
            $table->tinyInteger('status')->default(1)->comment("1=>Active; 0=>Inactive");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('instructions');
    }
};
