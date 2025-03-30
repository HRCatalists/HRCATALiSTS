<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('employee_employment_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('parent_department')->nullable();
            $table->string('parent_college')->nullable();
            $table->string('classification')->nullable();
            $table->string('employment_status')->nullable();
            $table->date('date_employed')->nullable();
            $table->string('accreditation')->nullable();
            $table->date('date_permanent')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('employee_employment_details');
    }
};