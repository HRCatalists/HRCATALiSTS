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
    Schema::table('teaching_summary', function (Blueprint $table) {
        $table->string('old_rank')->nullable()->after('corporate_commitment');
        $table->float('old_score')->nullable()->after('old_rank');
    });
}

public function down(): void
{
    Schema::table('teaching_summary', function (Blueprint $table) {
        $table->dropColumn(['old_rank', 'old_score']);
    });
}

};
