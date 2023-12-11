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
        Schema::create('complain_messages', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complain_id')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->longText('message')->nullable();
            $table->string('attachment')->nullable();
            $table->tinyInteger('user_type')->nullable()->comment("1=>User; 2=>Agent");
            $table->string('slug');
            $table->tinyInteger('status')->comment('1=>Read; 0=>Unread');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complain_messages');
    }
};
