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
        Schema::create('payment_histories', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('package_id')->nullable();
            $table->double('purchased_connections')->default(0);
            $table->string('payment_through')->default("SSL COMMERZ");
            $table->string('tran_id')->nullable()->comment('Response From Payment Gateway');
            $table->string('val_id')->nullable()->comment('Response From Payment Gateway');
            $table->string('amount')->nullable()->comment('Response From Payment Gateway');
            $table->string('card_type')->nullable()->comment('Response From Payment Gateway');
            $table->string('store_amount')->nullable()->comment('Response From Payment Gateway');
            $table->string('card_no')->nullable()->comment('Response From Payment Gateway');
            $table->string('bank_tran_id')->nullable()->comment('Response From Payment Gateway');
            $table->string('status')->nullable()->comment('Response From Payment Gateway');
            $table->string('tran_date')->nullable()->comment('Response From Payment Gateway');
            $table->string('currency')->nullable()->comment('Response From Payment Gateway');
            $table->string('card_issuer')->nullable()->comment('Response From Payment Gateway');
            $table->string('card_brand')->nullable()->comment('Response From Payment Gateway');
            $table->string('card_sub_brand')->nullable()->comment('Response From Payment Gateway');
            $table->string('card_issuer_country')->nullable()->comment('Response From Payment Gateway');
            $table->string('store_id')->nullable()->comment('Response From Payment Gateway');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_histories');
    }
};
