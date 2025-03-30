<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('employee_licenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('cascade');
            $table->string('license_name');
            $table->string('license_number')->nullable();
            $table->date('expiry_date')->nullable();
            $table->date('renewal_from')->nullable();
            $table->date('renewal_to')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('employee_licenses');
    }
};