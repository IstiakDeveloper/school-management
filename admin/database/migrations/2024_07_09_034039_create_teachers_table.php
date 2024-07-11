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
        Schema::create('teachers', function (Blueprint $table) {
            $table->id();
            $table->string('name_bn');
            $table->string('name_en');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->date('dob');
            $table->string('mobile_number');
            $table->string('email')->nullable();
            $table->string('designation');
            $table->date('first_joining');
            $table->string('job_status');
            $table->string('pin_number');
            $table->string('nationality');
            $table->string('religion');
            $table->string('blood_group');
            $table->string('signature')->nullable();
            $table->string('photo')->nullable();
            // Present Address
            $table->string('present_division');
            $table->string('present_district');
            $table->string('present_upazila');
            $table->string('present_union')->nullable();
            $table->string('present_post_office');
            $table->string('present_postal_code')->nullable();
            $table->text('present_address');
            // Permanent Address
            $table->string('permanent_division');
            $table->string('permanent_district');
            $table->string('permanent_upazila');
            $table->string('permanent_union')->nullable();
            $table->string('permanent_post_office');
            $table->string('permanent_postal_code')->nullable();
            $table->text('permanent_address');
            $table->json('subjects_of_teaching')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
