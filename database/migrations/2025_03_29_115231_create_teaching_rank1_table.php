<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('faculty_teaching_ranks', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID
            $table->string('department')->index(); // Add index for performance

            // Educational qualifications
            $table->integer('bachelors_degree')->nullable();
            $table->integer('academic_units_masters')->nullable();
            $table->integer('ma_ms_mat_mba_mpm_candidate')->nullable();
            $table->integer('masters_thesis_no_so')->nullable();
            $table->integer('full_masters_degree')->nullable();
            $table->integer('academic_units_doctorate')->nullable();
            $table->integer('phd_ed')->nullable();
            $table->integer('doctorate_dissertation')->nullable();
            $table->integer('full_doctorate_degree')->nullable();

            // Additional degrees
            $table->integer('another_bachelors')->nullable();
            $table->integer('another_masters')->nullable();
            $table->integer('another_doctorate')->nullable();
            $table->integer('multiple_degrees')->nullable();

            // Certifications and training
            $table->integer('special_training')->nullable();
            $table->integer('travel_study_grant')->nullable();
            $table->integer('seminars_workshops')->nullable();
            $table->integer('professional_education_units')->nullable();
            $table->integer('plumbing_license')->nullable();
            $table->integer('certificate_completion')->nullable();
            $table->integer('national_certificate')->nullable();
            $table->integer('trainors_methodology')->nullable();

            // Certifications (Changed to boolean where applicable)
            $table->boolean('teachers_board')->nullable();
            $table->boolean('cs_certification')->nullable();
            $table->boolean('bar_cpa_md_engineering')->nullable();

            // Achievements
            $table->integer('board_bar_placer')->nullable();
            $table->integer('award_local')->nullable();
            $table->integer('award_regional')->nullable();
            $table->integer('award_national')->nullable();
            $table->integer('summa_cum_laude')->nullable();
            $table->integer('magna_cum_laude')->nullable();
            $table->integer('cum_laude')->nullable();
            $table->integer('with_distinction')->nullable();

            $table->integer('total_points')->nullable();

            // Foreign key constraint
            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('faculty_teaching_ranks');
    }
};
