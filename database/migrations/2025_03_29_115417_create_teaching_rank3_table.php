<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teaching_rank3', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID reference

            // Classroom/Teacher Performance Evaluation
            $table->integer('classroom_evaluation')->nullable(); // 50 pts maximum

            // Work Performance Evaluation
            $table->integer('work_evaluation')->nullable(); // 50 pts maximum

            // Total Points earned
            $table->integer('total_points')->nullable();

            // Weighted Total Points (35%)
            $table->decimal('total_percentage', 5, 2)->nullable(); // Stores the weighted score

            // Foreign key constraint to reference employee in teaching_rank2
            $table->foreign('emp_id')->references('emp_id')->on('teaching_rank2')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teaching_rank3');
    }
};
