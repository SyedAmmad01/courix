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
        Schema::create('shippers', function (Blueprint $table) {
            $table->id();
            $table->string('shipper_code');
            $table->string('company_name');
            $table->string('manager_name');
            $table->string('shipper_email');
            $table->string('contact_office_1');
            $table->string('contact_office_2')->nullable();
            $table->string('trade_license_no')->nullable();
            $table->string('country');
            $table->string('volumetric_weight');
            $table->string('city');
            $table->string('area');
            $table->string('street_address');
            $table->string('shipper_image')->nullable();
            $table->string('file_name')->nullable();
            $table->string('select_file')->nullable();
            $table->string('employee')->nullable();
            $table->string('driver')->nullable();
            $table->string('user_name')->nullable();
            $table->string('password')->nullable();
            $table->string('confirm_password')->nullable();
            $table->string('status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shippers');
    }
};
