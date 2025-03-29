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

            // Participation fields
            $table->integer('Attendance_school_sponsored_activities')->nullable();
            $table->integer('Committee_Involvement')->nullable();
            $table->integer('Participation_in_the_CC_Community_Extension_Program')->nullable();

            // Total Points calculation
            $table->integer('TotalPoints')->nullable();

            // Foreign key constraint
            $table->foreign('emp_id')->references('emp_id')->on('teaching_rank3')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teaching_rank4');
    }
};
