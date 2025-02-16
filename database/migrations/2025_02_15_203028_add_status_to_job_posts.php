<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusToJobPosts extends Migration
{
    public function up()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->string('status')->default('inactive')->after('end_date'); // ✅ Adds a status column after end_date
        });
    }

    public function down()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->dropColumn('status'); // ✅ Drops the column if the migration is rolled back
        });
    }
}

