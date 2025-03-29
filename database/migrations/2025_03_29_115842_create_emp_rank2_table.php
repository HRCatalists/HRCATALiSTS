<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('emp_rank2', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID reference
            
            // Length of Service
            $table->integer('full_time_service_columban')->nullable();
            $table->integer('full_time_service_cesdi')->nullable();

            // Administration Experience
            $table->integer('admin_experience')->nullable();

            // Foreign key constraint linking to empRank1
            $table->foreign('emp_id')->references('emp_id')->on('emp_rank1')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emp_rank2');
    }
};

