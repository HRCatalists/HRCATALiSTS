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

            // Foreign keys linking to total points from different teaching rank tables
            $table->integer('Academy_Preparation_Other_Qualifications')->nullable();
            $table->integer('Faculty_Performance')->nullable();
            $table->integer('Corporate_Commitmen')->nullable();
            $table->integer('TeachingAndWorkExp')->nullable();

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

