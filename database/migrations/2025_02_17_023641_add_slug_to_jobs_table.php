<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('job_posts', 'slug')) {
                $table->string('slug')->nullable(); // ✅ Allow NULL initially
            }
        });

        // ✅ Generate slugs for existing records, ensuring uniqueness
        DB::statement("
            UPDATE job_posts 
            SET slug = LOWER(REPLACE(job_title, ' ', '-')) 
            WHERE slug IS NULL OR slug = '';
        ");

        // ✅ Ensure uniqueness by appending ID where duplicates exist
        DB::statement("
            UPDATE job_posts 
            SET slug = CONCAT(slug, '-', id) 
            WHERE slug IN (
                SELECT slug FROM (SELECT slug FROM job_posts GROUP BY slug HAVING COUNT(*) > 1) AS temp
            );
        ");

        // ✅ Ensure the column is NOT NULL moving forward
        Schema::table('job_posts', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change();
        });

        // ✅ Add a unique constraint to enforce uniqueness
        Schema::table('job_posts', function (Blueprint $table) {
            $table->unique('slug', 'unique_slug_constraint'); // ✅ Uses a named constraint to prevent conflicts
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            if (Schema::hasColumn('job_posts', 'slug')) {
                $table->dropUnique('unique_slug_constraint'); // ✅ Drops unique constraint safely
                $table->dropColumn('slug'); // ✅ Drops the column
            }
        });
    }
};
