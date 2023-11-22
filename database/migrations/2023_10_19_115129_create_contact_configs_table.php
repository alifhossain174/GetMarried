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
        Schema::create('contact_configs', function (Blueprint $table) {
            $table->id();
            $table->string('page_title')->nullable();
            $table->string('page_title_bn')->nullable();
            $table->string('background_color')->nullable();
            $table->string('background_image')->nullable();
            $table->tinyInteger('priority')->default(1)->comment("1=>Background Image; 2=>Background Color");
            $table->longText('google_map_link')->nullable();
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
        Schema::dropIfExists('contact_configs');
    }
};
