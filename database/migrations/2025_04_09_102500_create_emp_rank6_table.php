<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('emp_rank6', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');

            // Group radio field (participation checkbox-like logic)
            $table->boolean('group_participation')->nullable();

            // Checkboxes with 0.25 credit each
            $table->boolean('annual_retreats')->nullable();
            $table->boolean('seminars_or_further_studies')->nullable();
            $table->boolean('community_outreach_program')->nullable();
            $table->boolean('clean_green_program')->nullable();

            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emp_rank6');
    }
};
