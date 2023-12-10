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
        Schema::create('biodata_complains', function (Blueprint $table) {
            $table->id();
            $table->string('complain_no')->nullable();
            $table->unsignedBigInteger('biodata_id')->nullable();
            $table->unsignedBigInteger('submitted_by')->nullable()->comment("User ID");
            $table->tinyInteger('reason')->nullable()->comment("1=>Wrong Contact Info; 2=>Wrong Biodata Info; 3=>Others");
            $table->string('contact_no')->nullable();
            $table->longText('details')->nullable();
            $table->string('attachment')->nullable();
            $table->tinyInteger('status')->default(0)->comment('0=>Pending; 1=>In Progress; 2=>Complete; 3=>Cancelled');
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_complains');
    }
};
