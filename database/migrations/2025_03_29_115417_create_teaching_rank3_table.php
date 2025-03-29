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

            // Evaluation scores
            $table->integer('classroom_TeacherEvaluation')->nullable();
            $table->integer('Work_Performance_Evaluation')->nullable();

            // Total Points calculation
            $table->integer('TotalPoints')->nullable();

            // Foreign key constraint
            $table->foreign('emp_id')->references('emp_id')->on('teaching_rank2')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teaching_rank3');
    }
};

