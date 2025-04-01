<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teaching_rank4', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID reference

            // Attendance in school-sponsored activities
            $table->boolean('attendance_activities')->default(false); // 30 pts max

            // Committee Involvement / Voluntary Services
            $table->boolean('committee_involvement')->default(false); // 30 pts max

            // Participation in Community Extension Program
            $table->boolean('community_extension')->default(false); // 40 pts max

            // Total points earned
            $table->integer('total_points')->nullable();

            // Weighted total points (15%)
            $table->decimal('total_percentage', 5, 2)->nullable(); // Stores the weighted score

            // Foreign key constraint to reference employee in teaching_rank3
            $table->foreign('emp_id')->references('emp_id')->on('teaching_rank3')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teaching_rank4');
    }
};
