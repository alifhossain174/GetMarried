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
        Schema::create('pricing_packages', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('title_bn')->nullable();
            $table->double('connections')->nullable();
            $table->double('price')->nullable();
            $table->longText('description')->nullable();
            $table->longText('description_bn')->nullable();
            $table->tinyInteger('status')->default(1)->comment("1=>Active; 0=>Inactive");
            $table->double('serial')->default(1);
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pricing_packages');
    }
};
