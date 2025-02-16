<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            if (!Schema::hasColumn('job_posts', 'slug')) {
                $table->string('slug')->nullable();
            }
        });
    
        // Generate slugs for existing records
        DB::statement("UPDATE job_posts SET slug = LOWER(REPLACE(job_title, ' ', '-')) WHERE slug IS NULL OR slug = '';");
    
        // Now add the unique constraint
        Schema::table('job_posts', function (Blueprint $table) {
            $table->unique('slug');
        });
    }
    
    

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropColumn('slug');
        });
    }
};
