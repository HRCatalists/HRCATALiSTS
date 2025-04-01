<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teaching_summary', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID reference

            // Credit Points Earned from Different Categories
            $table->integer('academy_preparation_other_qualifications')->nullable();
            $table->integer('faculty_performance')->nullable();
            $table->integer('corporate_commitment')->nullable();
            $table->integer('teaching_and_work_exp')->nullable();

            // Foreign key constraints
            $table->foreign('emp_id')->references('emp_id')->on('teaching_rank4')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teaching_summary');
    }
};
