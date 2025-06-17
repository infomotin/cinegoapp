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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('property_id');
            $table->foreign('property_id')->references('id')->on('properties')->onDelete('cascade');
            //Address fields
            $table->unsignedBigInteger('country_id');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->unsignedBigInteger('division_id');
            $table->foreign('division_id')->references('id')->on('divisions')->onDelete('cascade');
            $table->unsignedBigInteger('district_id');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
            $table->unsignedBigInteger('zone_id');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
            $table->unsignedBigInteger('city_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
            $table->unsignedBigInteger('police_station_id');
            $table->foreign('police_station_id')->references('id')->on('police_stations')->onDelete('cascade');
            $table->unsignedBigInteger('road_id');
            $table->foreign('road_id')->references('id')->on('roads')->onDelete('cascade');
            $table->unsignedBigInteger('landmark_id');
            $table->foreign('landmark_id')->references('id')->on('landmarks')->onDelete('cascade');
            $table->unsignedBigInteger('word_id');
            $table->foreign('word_id')->references('id')->on('words')->onDelete('cascade');
            //Personal Address fields
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();
           //building address fields
            $table->string('building_name')->nullable();
            $table->string('floor')->nullable();
            $table->string('room_number')->nullable();
            $table->string('apartment_number')->nullable();
            $table->string('zip_code')->nullable();
            //



            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
