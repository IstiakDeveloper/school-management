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
        Schema::table('users', function (Blueprint $table) {
            $table->unsignedBigInteger('student_admission_id')->nullable()->after('id');
            $table->foreign('student_admission_id')->references('id')->on('student_admissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {


            $table->dropForeign(['student_admission_id']);
            $table->dropColumn('student_admission_id');
        });
    }
};
