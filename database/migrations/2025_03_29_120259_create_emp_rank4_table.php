<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('emp_rank4', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID reference
            
            // Committee Participation
            $table->integer('Membership_in_School_Committees')->nullable();
            $table->integer('Chairmanship_in_School_Committees')->nullable();

            // Foreign key constraint linking to empRank3
            $table->foreign('emp_id')->references('emp_id')->on('emp_rank3')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emp_rank4');
    }
};
