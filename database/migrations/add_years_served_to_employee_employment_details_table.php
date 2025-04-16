<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('employee_employment_details', function (Blueprint $table) {
            $table->integer('years_served')->nullable()->after('classification');
        });
    }

    public function down(): void
    {
        Schema::table('employee_employment_details', function (Blueprint $table) {
            $table->dropColumn('years_served');
        });
    }
};
