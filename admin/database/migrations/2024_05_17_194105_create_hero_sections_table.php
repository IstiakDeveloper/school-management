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
        Schema::create('hero_sections', function (Blueprint $table) {
            $table->id();
            $table->string('small_title');
            $table->string('big_title');
            $table->string('link1_text');
            $table->string('link1_url');
            $table->string('link2_text');
            $table->string('link2_url');
            $table->string('service1_title');
            $table->string('service1_image');
            $table->string('service2_title');
            $table->string('service2_image');
            $table->string('service3_title');
            $table->string('service3_image');
            $table->string('background_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hero_sections');
    }
};
