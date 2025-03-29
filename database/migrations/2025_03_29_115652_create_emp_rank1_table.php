<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('emp_rank1', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID reference

            $table->integer('AcademicUnitsDegree')->nullable();
            $table->integer('AdditionalDegree')->nullable();
            $table->integer('Special_Training')->nullable();

            // Foreign key constraint linking to employee table
            $table->foreign('emp_id')->references('emp_id')->on('employee')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emp_rank1');
    }
};

