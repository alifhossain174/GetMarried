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
        Schema::create('sms_gateways', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('provider_name');
            $table->string('api_endpoint');
            $table->string('api_key')->nullable();
            $table->string('secret_key')->nullable();
            $table->string('sender_id')->nullable();
            $table->tinyInteger('status')->default(1)->comment("0=>Inactive; 1=>Active");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sms_gateways');
    }
};
