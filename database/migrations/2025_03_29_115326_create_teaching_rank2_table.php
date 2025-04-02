<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('teaching_rank2', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key
            $table->unsignedBigInteger('emp_id'); // Employee ID

            // Teaching experience
            $table->integer('full_time_cc')->nullable();
            $table->integer('full_time_other_schools')->nullable();
            $table->integer('part_time_cc')->nullable();
            $table->integer('part_time_other_schools')->nullable();

            // Research involvement
            $table->integer('research_class_based')->nullable();
            $table->integer('research_school_based')->nullable();
            $table->integer('research_community_based')->nullable();

            // Academic contributions
            $table->integer('course_module')->nullable();
            $table->integer('workbook_lab_manual')->nullable();
            $table->integer('research_articles')->nullable();
            $table->integer('journal_editorship')->nullable();

            // Participation in committees
            $table->integer('participation_chairman')->nullable();
            $table->integer('participation_member')->nullable();

            // Resource person activities
            $table->integer('resource_person_within')->nullable();
            $table->integer('resource_person_outside')->nullable();

            // Membership & leadership roles
            $table->integer('membership_officer_accreditor')->nullable();
            $table->integer('membership_member')->nullable();

            // Total points calculation
            $table->integer('total_Points')->nullable();

            // Foreign key constraint
            $table->foreign('emp_id')->references('emp_id')->on('teaching_rank1')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('teaching_rank2');
    }
};