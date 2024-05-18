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
        Schema::create('student_reviews', function (Blueprint $table) {
            $table->id();
            $table->string('main_title');
            $table->text('description');
            $table->timestamps();
        });

        Schema::create('student_review_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('stars');
            $table->string('summary');
            $table->string('name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_review_items');
        Schema::dropIfExists('student_reviews');
    }
};
