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
        Schema::create('drivers', function (Blueprint $table) {
            $table->id();
            $table->string('driver_code');
            $table->string('employee_code');
            $table->string('employee_name');
            $table->string('employee_mobile');
            $table->string('city');
            $table->string('zones');
            $table->string('status');
            $table->string('app_username');
            $table->string('app_password');
            $table->string('app_confirm_password');
            $table->string('password');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('drivers');
    }
};
