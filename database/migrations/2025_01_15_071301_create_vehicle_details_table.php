<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleDetailsTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->string('company_name');
            $table->string('abn')->nullable();
            $table->string('slug')->unique();
            $table->string('reg_no')->unique();
            $table->date('purchase_date')->nullable();
            $table->string('fuel_type')->nullable();
            $table->string('make')->nullable();
            $table->string('vin')->nullable();
            $table->string('model')->nullable();
            $table->string('engine_no')->nullable();
            $table->string('battery_size')->nullable();
            $table->string('owner')->nullable();
            $table->string('color')->nullable();
            $table->string('type')->nullable();
            $table->integer('odometer')->nullable();
            $table->string('transmission')->nullable();
            $table->date('reg_expiry_date')->nullable();
            $table->date('last_service_date')->nullable();
            $table->boolean('rented')->default(false);
            $table->string('insurance_company')->nullable();
            $table->string('insurance_number')->nullable();
            $table->date('vehicle_inspection_report_expiring_date')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('thumbnail_alt')->nullable();
            $table->string('cost_per_week')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_details');
    }
}
