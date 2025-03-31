<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicleFilesTable extends Migration
{
    public function up()
    {
        Schema::create('vehicle_files', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_detail_id')->constrained('vehicle_details')->onDelete('cascade');
            $table->string('file_path');
            $table->string('file_name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('vehicle_files');
    }
}
