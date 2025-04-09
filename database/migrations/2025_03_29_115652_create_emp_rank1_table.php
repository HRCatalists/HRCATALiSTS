<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('emp_rank1', function (Blueprint $table) {
            $table->id(); // Primary key (auto-increment)
            $table->unsignedBigInteger('emp_id'); // Foreign key reference
        
            $table->integer('AcademicUnitsDegree')->nullable();
            $table->integer('AdditionalDegree')->nullable();
            $table->integer('Special_Training')->nullable();
        
            // Ensure `emp_id` references `id` in `employees`
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
        
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emp_rank1');
    }
};
