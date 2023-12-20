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
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('barcode')->nullable();
            $table->string('tracking_number')->nullable();
            $table->string('awb_number');
            $table->string('reference_number');
            $table->string('order_date');
            $table->string('service_type');
            $table->string('shipper_code');
            $table->string('shipper_name');
            $table->string('contact_office_1');
            $table->string('account_name')->nullable();
            $table->string('reciver_name');
            $table->string('mobile_1')->nullable();
            $table->string('mobile_2')->nullable();
            $table->string('cod');
            $table->string('service_charges')->nullable();
            $table->string('instruction');
            $table->string('description');
            $table->string('country');
            $table->string('city');
            $table->string('area');
            $table->string('street_address');
            $table->string('delivery_code')->nullable();
            $table->string('actual_weight')->nullable();
            $table->string('is_fragile')->nullable();
            $table->string('no_of_peices');
            $table->string('details_of_products')->nullable();
            $table->string('cod_peice')->nullable();
            $table->string('status');
            $table->string('comments')->nullable();
            $table->string('inscan');
            $table->string('outscan');
            $table->string('driver_id')->nullable();
            $table->string('warehouse')->nullable();
            $table->string('rack')->nullable();
            $table->string('delivery_attempt')->nullable();
            $table->string('payment_method')->nullable();
            $table->string('transition_id')->nullable();
            $table->string('job_status')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shipments');
    }
};
