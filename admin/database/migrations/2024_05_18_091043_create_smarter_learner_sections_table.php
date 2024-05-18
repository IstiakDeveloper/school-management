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
        Schema::create('smarter_learner_sections', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->text('description');
            $table->string('background_image')->nullable();
            $table->string('video_url');
            $table->string('item1_title');
            $table->integer('item1_number');
            $table->string('item2_title');
            $table->integer('item2_number');
            $table->string('item3_title');
            $table->integer('item3_number');
            $table->string('item4_title');
            $table->integer('item4_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('smarter_learner_sections');
    }
};
