<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('employee_employment_details', function (Blueprint $table) {
            $table->string('contract_type')->nullable()->after('employment_status');
        });
    }

    public function down(): void
    {
        Schema::table('employee_employment_details', function (Blueprint $table) {
            $table->dropColumn('contract_type');
        });
    }
};

