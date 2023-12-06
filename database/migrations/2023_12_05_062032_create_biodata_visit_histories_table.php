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
        Schema::create('biodata_visit_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('biodata_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->string('from_ip_address')->nullable();
            $table->string('browser')->nullable();
            $table->string('os')->nullable();
            $table->string('device')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_visit_histories');
    }
};
