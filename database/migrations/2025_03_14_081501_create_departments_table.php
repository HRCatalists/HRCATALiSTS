<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('departments', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('code')->unique();
            $table->timestamps();
        });

        // Insert predefined departments with codes
        DB::table('departments')->insert([
            ['name' => 'College of Business and Accountancy', 'code' => 'CBA'],
            ['name' => 'College of Arts & Sciences / Education', 'code' => 'CASED'],
            ['name' => 'College of Computer Studies', 'code' => 'CCS'],
            ['name' => 'College of Engineering', 'code' => 'COE'],
            ['name' => 'College of Architecture', 'code' => 'COA'],
            ['name' => 'College of Nursing', 'code' => 'CON'],
            ['name' => 'Graduate Studies for Professional Advancement & CE', 'code' => 'GSPACE'],
            ['name' => 'Basic Education - Main & Barretto Campuses', 'code' => 'BASICED'],
            ['name' => 'CCI - Sta. Cruz Campus', 'code' => 'CCISC'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('departments');
    }
};
