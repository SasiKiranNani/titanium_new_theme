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
        Schema::create('service_bookings', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->unsignedBigInteger('time_slot_id');
            $table->unsignedBigInteger('vehicle_id');
            $table->string('odometer')->nullable();
            $table->string('service_interval')->nullable();
            $table->string('next_service_due')->nullable();
            $table->string('service_job_id')->nullable();
            $table->string('miscellaneous')->nullable();
            $table->boolean('gst_toggle')->default(false);
            $table->decimal('gst_percentage', 5, 2)->nullable();
            $table->decimal('total', 10, 2)->nullable();
            $table->string('abn', 15)->nullable();
            $table->string('repair_order_no', 50)->nullable();
            $table->string('color', 20)->nullable();
            $table->string('mobile', 15)->nullable();
            $table->string('cust_name', 100)->nullable();
            $table->string('street', 100)->nullable();
            $table->string('state', 50)->nullable();
            $table->string('post_code', 10)->nullable();
            $table->string('make', 50)->nullable();
            $table->string('model', 50)->nullable();
            $table->string('vin', 50)->nullable();
            $table->date('purchase_date')->nullable();
            $table->string('engine_no', 50)->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_bookings');
    }
};
