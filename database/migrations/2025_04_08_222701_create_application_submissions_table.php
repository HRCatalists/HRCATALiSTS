<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationSubmissionsTable extends Migration
{
    public function up()
    {
        Schema::create('application_submissions', function (Blueprint $table) {
            $table->id();

            // Core applicant info
            $table->string('full_name');
            $table->string('email');
            $table->string('classification')->nullable(); // teaching or non-teaching

            // Job info
            $table->unsignedBigInteger('job_id')->nullable();
            $table->string('job_title')->nullable();

            // Status at submission time (archived or rejected)
            $table->string('status')->nullable();

            // Submission timestamp
            $table->timestamp('submitted_at')->useCurrent();
        });
    }

    public function down()
    {
        Schema::dropIfExists('application_submissions');
    }
}
