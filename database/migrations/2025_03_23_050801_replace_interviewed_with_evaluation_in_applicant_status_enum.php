<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        // Replace 'interviewed' with 'evaluation'
        DB::statement("ALTER TABLE applicants MODIFY status ENUM(
            'pending',
            'screening',
            'scheduled',
            'evaluation', -- ✅ replacing 'interviewed'
            'hired',
            'rejected',
            'archived'
        ) NOT NULL DEFAULT 'pending'");
    }

    public function down(): void
    {
        // Revert back if needed
        DB::statement("ALTER TABLE applicants MODIFY status ENUM(
            'pending',
            'screening',
            'scheduled',
            'interviewed', -- 👈 restore original
            'hired',
            'rejected',
            'archived'
        ) NOT NULL DEFAULT 'pending'");
    }
};