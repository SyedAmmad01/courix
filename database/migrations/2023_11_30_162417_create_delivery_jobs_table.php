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
        Schema::create('delivery_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('shipment_id');
            $table->string('status_type')->nullable();
            $table->string('status')->nullable();
            $table->string('auth_id')->nullable();
            $table->string('driver_id')->nullable();
            $table->string('comments')->nullable();
            $table->string('remarks')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('delivery_jobs');
    }
};
