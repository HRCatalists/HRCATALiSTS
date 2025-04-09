<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('emp_rank5', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('emp_id');

            // Group participation (radio)
            $table->boolean('group_participation')->nullable();

            // In-School Activities
            $table->boolean('institutional_orientation')->nullable();
            $table->boolean('departmental_seminars')->nullable();
            $table->boolean('retreat_recollection')->nullable();
            $table->boolean('first_friday_masses')->nullable();
            $table->boolean('sportfest')->nullable();
            $table->boolean('foundation_day')->nullable();
            $table->boolean('christmas_party')->nullable();
            $table->boolean('teachers_day')->nullable();
            $table->boolean('graduation_exercises')->nullable();

            // Out-of-School Activities
            $table->boolean('socio_civic_involvement')->nullable();
            $table->boolean('community_extension_services')->nullable();
            $table->boolean('departmental_community_program')->nullable();
            $table->boolean('clean_and_green')->nullable();

            $table->timestamps();

            $table->foreign('emp_id')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('emp_rank5');
    }
};
