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
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('question_set_id')->nullable();
            $table->string('question')->nullable();
            $table->string('question_bn')->nullable();
            $table->longText('hints')->nullable();
            $table->longText('hints_bn')->nullable();
            $table->tinyInteger('type')->default(1)->comment("1=>Open Ended; 2=>MCQ; 3=>Short Question");
            $table->double('serial')->default(1);
            $table->tinyInteger('required')->default(1)->comment('1=>Yes; 0=>No');
            $table->tinyInteger('status')->default(1)->comment('1=>Active; 0=>Inactive');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
