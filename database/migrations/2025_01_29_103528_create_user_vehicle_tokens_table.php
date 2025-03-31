<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_vehicle_tokens', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('vehicle_id');
            $table->string('token')->unique();
            $table->timestamp('expires_at');
            $table->date('rent_start_date')->nullable();
            $table->date('rent_end_date')->nullable();
            $table->decimal('cost_per_week', 8, 2)->nullable();
            $table->integer('odometer')->nullable();
            $table->integer('total_days')->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->decimal('deposit_amount', 10, 2)->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('vehicle_id')->references('id')->on('vehicle_details')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_vehicle_tokens');
    }
};
