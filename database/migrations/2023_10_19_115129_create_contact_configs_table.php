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
            $table->longText('map_iframe_src')->nullable();
            $table->string('map_direction_button_text')->nullable();
            $table->string('map_direction')->nullable();
            $table->string('contact_section_title')->nullable();
            $table->string('address_label')->nullable();
            $table->string('address')->nullable();
            $table->string('contact_label')->nullable();
            $table->string('primary_contact')->nullable();
            $table->string('secondary_contact')->nullable();
            $table->string('email_label')->nullable();
            $table->string('primary_email')->nullable();
            $table->string('secondary_email')->nullable();
            $table->string('contact_form_image')->nullable();
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
