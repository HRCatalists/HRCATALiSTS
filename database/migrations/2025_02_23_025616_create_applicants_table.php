<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
            Schema::create('applicants', function (Blueprint $table) {
                $table->id();
                $table->string('first_name', 100);
                $table->string('last_name', 100);
                $table->string('email', 150)->unique();
                $table->string('phone_number', 20);
                $table->text('address');
                $table->string('resume', 255); // File path of uploaded CV
                $table->boolean('privacy_policy_agreed')->default(false);
                $table->enum('status', ['pending', 'screening','scheduled', 'interviewed', 'hired', 'rejected','archived'])->default('pending');
                $table->timestamp('applied_at')->useCurrent();
                $table->string('ip_address', 45)->nullable();
                $table->string('user_agent', 255)->nullable();
                $table->foreignId('job_id')->constrained('job_posts')->onDelete('cascade')->onUpdate('cascade'); // Foreign key

                $table->timestamps(); // Laravel default created_at and updated_at
            });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applicants');
    }
};
