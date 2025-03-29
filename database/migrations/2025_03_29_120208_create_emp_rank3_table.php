<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('emp_rank3', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID reference
            
            // Evaluation Ratings
            $table->integer('Excellent')->nullable();
            $table->integer('Very_Good')->nullable();
            $table->integer('Good')->nullable();
            $table->integer('Fair')->nullable();
            $table->integer('Poor')->nullable();

            // Foreign key constraint linking to empRank2
            $table->foreign('emp_id')->references('emp_id')->on('emp_rank2')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emp_rank3');
    }
};

