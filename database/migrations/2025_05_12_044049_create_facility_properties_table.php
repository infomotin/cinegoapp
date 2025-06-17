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
        Schema::create('facility_properties', function (Blueprint $table) {
            $table->id();
            $table->integer('property_id');
            $table->string('facility_name')->nullable();
            $table->string('facility_distance')->nullable();
            $table->string('facility_icon')->nullable();
            $table->string('facility_type')->nullable();
            $table->string('distance')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('facility_properties');
    }
};
