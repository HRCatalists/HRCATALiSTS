<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->string('slug')->nullable()->change(); // ✅ Make slug nullable
        });
    }

    public function down()
    {
        Schema::table('job_posts', function (Blueprint $table) {
            $table->string('slug')->nullable(false)->change(); // Revert if needed
        });
    }
};

