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
        Schema::create('bio_data', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('biodata_no')->nullable();

            $table->integer('biodata_type_id')->nullable();
            $table->integer('marital_condition_id')->nullable();
            $table->string('birth_date')->nullable();
            $table->double('height_foot')->default(1);
            $table->double('height_inch')->default(0);
            $table->string('skin_tone')->comment("1=>Black; 2=>Brown; 3=>Light Brown; 4=>White; 5=>Bright White")->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_group')->comment("1=>A+; 2=>A-; 3=>B+; 4=>B-; 5=>AB+; 6=>AB-; 7=>O+; 8=>O-")->nullable();
            $table->integer('nationality')->nullable();
            $table->integer('permenant_district_id')->nullable();
            $table->integer('permenant_upazila_id')->nullable();
            $table->string('permenant_address')->nullable();
            $table->integer('present_district_id')->nullable();
            $table->integer('present_upazila_id')->nullable();
            $table->string('present_address')->nullable();
            $table->string('name')->nullable();
            $table->string('contact_no')->nullable();
            $table->string('image')->nullable();
            $table->tinyInteger('show_image')->default(0)->comment("0=>Dont Show; 1=>Show");
            $table->string('gurdians_mobile_no')->nullable();
            $table->string('relation_with_gurdian')->nullable();
            $table->string('email')->nullable();
            $table->double('views')->default(0);

            $table->tinyInteger('status')->default(0)->comment('0=>Pending; 1=>Active; 2=>Blocked');
            $table->string('remarks')->nullable();

            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bio_data');
    }
};
