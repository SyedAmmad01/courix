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
        Schema::create('order_inscans', function (Blueprint $table) {
            $table->id();
            $table->string('shipment_id');
            $table->string('auth_id');
            $table->string('warehouse')->nullable();
            $table->string('rack')->nullable();
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
        Schema::dropIfExists('order_inscans');
    }
};
