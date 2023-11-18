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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_code');
            $table->string('emp_first_name');
            $table->string('emp_middle_name');
            $table->string('emp_last_name');
            $table->string('dob');
            $table->string('marital_status');
            $table->string('gender');
            $table->string('nationality');
            $table->string('passport_number')->nullable();
            $table->string('passport_expiry_date')->nullable();
            $table->string('immigration_status')->nullable();
            $table->string('immigration_expiry_date')->nullable();
            $table->string('emirates_id')->nullable();
            $table->string('emp_image')->nullable();
            $table->string('other_id')->nullable();
            $table->string('driving_liscense_no')->nullable();
            $table->string('phone')->nullable();
            $table->string('mobile');
            $table->string('emergency_phone')->nullable();
            $table->string('work_email')->nullable();
            $table->string('private_email')->nullable();
            $table->string('city')->nullable();
            $table->string('country');
            $table->string('zip_code')->nullable();
            $table->string('address_line_1')->nullable();
            $table->string('address_line_2')->nullable();
            $table->string('job_title');
            $table->string('department');
            $table->string('confirm_date')->nullable();
            $table->string('emp_status');
            $table->string('joined_date');
            $table->string('termination_date')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('confirm_password')->nullable();
            $table->string('user_role')->nullable();
            $table->string('user_status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
