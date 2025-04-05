<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('employees', function (Blueprint $table) {
    
            $table->string('academic_year')->nullable();
            $table->string('faculty_code')->nullable();
            $table->string('school_of')->nullable();
            $table->string('designation_group')->nullable();
            $table->string('branch')->nullable();
            $table->string('tel_no')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->string('gender')->nullable();
            $table->string('religion')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('spouse_name')->nullable();
            $table->string('spouse_address')->nullable();
            $table->string('spouse_occupation')->nullable();
            $table->integer('no_of_dependents')->nullable();
            $table->text('children_names')->nullable();
            $table->text('children_birthdates')->nullable();
            $table->string('father_name')->nullable();
            $table->string('father_address')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('mother_address')->nullable();
            $table->string('sss_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('pagibig_no')->nullable();
        });
    }

    public function down()
    {
        Schema::table('employees', function (Blueprint $table) {
            $table->dropColumn([
                'department', 'job_title', 'academic_year', 'faculty_code', 'school_of', 'designation_group', 'branch',
                'tel_no', 'date_of_birth', 'place_of_birth', 'gender', 'religion', 'citizenship', 'civil_status',
                'spouse_name', 'spouse_address', 'spouse_occupation', 'no_of_dependents', 'children_names', 'children_birthdates',
                'father_name', 'father_address', 'mother_name', 'mother_address', 'sss_no', 'philhealth_no', 'tin_no', 'pagibig_no'
            ]);
        });
    }
};
