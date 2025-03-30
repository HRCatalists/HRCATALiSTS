<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('employee_trainings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->date('training_date')->nullable();
            $table->string('title')->nullable();
            $table->string('venue')->nullable();
            $table->string('remark')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('employee_trainings');
    }
};