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
        Schema::create('assign_vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no'); // Vehicle Registration No
            $table->string('user_id'); // User ID (Driver)
            $table->decimal('cost_per_week', 10, 2); // Price per week
            $table->date('rent_start_date'); // Rent Start Date
            $table->date('rent_end_date'); // Rent End Date
            $table->string('total_days'); // Total Days
            $table->decimal('total_price', 10, 2); // Total Price
            $table->decimal('deposit_amount', 10, 2); // Deposit Amount
            $table->decimal('outstanding_amount', 10, 2); // Outstanding Amount
            $table->string('payment_method'); // Payment Method
            $table->string('agreement'); // Agreement
            $table->boolean('rented')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // No need to drop foreign keys as they are not defined

        Schema::dropIfExists('assign_vehicles');
    }
};
