<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('provider_name')->nullable();
            $table->string('provider_id')->nullable();
            $table->string('email')->unique();
            $table->string('contact')->unique();
            $table->string('verification_code')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('address')->nullable();
            $table->tinyInteger('user_type')->comment("1=>Admin; 2=>User/Shop;")->default(2);
            $table->tinyInteger('status')->comment("1=>Active; 0=>Inactive")->default(1);

            $table->double('connections')->default(10);
            $table->string('last_purchase_date')->nullable();
            $table->string('expire_date')->nullable();

            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
