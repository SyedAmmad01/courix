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
        Schema::create('assign_to_third_parties', function (Blueprint $table) {
            $table->id();
            $table->string('shipment_id')->nullable();
            $table->string('company_name')->nullable();
            $table->string('delivery_date')->nullable();
            $table->string('driver_id')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('assign_to_third_parties');
    }
};
