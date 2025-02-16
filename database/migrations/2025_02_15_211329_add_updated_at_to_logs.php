<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddUpdatedAtToLogs extends Migration
{
    public function up()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->timestamp('updated_at')->nullable(); // ✅ Add `updated_at`
        });
    }

    public function down()
    {
        Schema::table('logs', function (Blueprint $table) {
            $table->dropColumn('updated_at');
        });
    }
}
