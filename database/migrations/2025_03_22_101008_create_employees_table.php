<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id(); // Employee ID
            $table->string('job_title'); // Storing job title as a string
            $table->string('department')->nullable(); // Just a string, not a foreign key
            $table->string('first_name');
            $table->string('last_name');
            $table->string('email')->unique();
            $table->string('phone')->nullable();
            $table->text('address')->nullable();
            $table->string('cv')->nullable(); // File path
            $table->boolean('privacy_policy_agreed')->default(false);
            $table->string('status')->default('active');
            $table->timestamp('applied_at')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
};
