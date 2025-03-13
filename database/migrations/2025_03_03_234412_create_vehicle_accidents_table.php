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
        Schema::create('vehicle_accidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('vehicle_id')->constrained()->onDelete('cascade');
            $table->date('accident_date');
            $table->string('insurance_ref')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicle_accidents');
    }
};
