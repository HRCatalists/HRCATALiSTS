<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teaching_rank1', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // User ID
            $table->string('department')->index(); // Add index for performance

            // Educational qualifications
            $table->integer('bachelor_degree')->nullable();
            $table->integer('academic_units_master_degree')->nullable();
            $table->integer('ma_ms_candidate')->nullable();
            $table->integer('masters_thesis_completed')->nullable();
            $table->integer('full_master_degree')->nullable();
            $table->integer('academic_units_doctorate_degree')->nullable();
            $table->integer('phd_education')->nullable();
            $table->integer('doctorate_dissertation_completed')->nullable();
            $table->integer('full_doctorate_degree')->nullable();

            // Additional degrees
            $table->integer('additional_bachelor_degree')->nullable();
            $table->integer('additional_master_degree')->nullable();
            $table->integer('additional_doctorate_degree')->nullable();
            $table->integer('multiple_degrees')->nullable();

            // Certifications and training
            $table->integer('specialized_training')->nullable();
            $table->integer('travel_grant_for_study')->nullable();
            $table->integer('seminars_attended')->nullable();
            $table->integer('professional_education_units')->nullable();
            $table->integer('plumbing_certification')->nullable();
            $table->integer('certificate_of_completion')->nullable();
            $table->integer('national_certification')->nullable();
            $table->integer('trainers_methodology')->nullable();

            // Certifications (Changed to boolean where applicable)
            $table->boolean('teachers_board_certified')->nullable();
            $table->boolean('career_service_certification')->nullable();
            $table->boolean('bar_exam_certification')->nullable();

            // Achievements
            $table->integer('board_exam_placer')->nullable();
            $table->integer('local_awards')->nullable();
            $table->integer('regional_awards')->nullable();
            $table->integer('national_awards')->nullable();
            $table->integer('summa_cum_laude')->nullable();
            $table->integer('magna_cum_laude')->nullable();
            $table->integer('cum_laude')->nullable();
            $table->integer('with_distinction')->nullable();

            $table->integer('total_points')->nullable();

            // Foreign key constraint
         // Foreign key constraint
         $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');

         $table->timestamps();
     });
 }

 public function down(): void
 {
     Schema::dropIfExists('teaching_rank1');
 }
};