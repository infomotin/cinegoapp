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
        Schema::create('properties', function (Blueprint $table) {
            $table->id();
            $table->string('ptype_id');
            $table->string('amenities_id');
            $table->string('property_name');
            $table->string('property_slug');
            $table->string('property_code');
            $table->string('property_status')->nullable();
            $table->string('lowest_price')->nullable();
            $table->string('max_price')->nullable();
            $table->string('property_thambnail');
            $table->text('short_descp')->nullable();
            $table->text('long_descp')->nullable();
            $table->string('bedrooms')->nullable();
            $table->string('bathrooms')->nullable();
            $table->string('garage')->nullable();
            $table->string('garage_size')->nullable(); 
            $table->string('property_size')->nullable();
            $table->text('property_video')->nullable();
            //address info 
            $table->string('city_name')->nullable();
            $table->string('street_name')->nullable();
            $table->string('street_number')->nullable();
            $table->string('building_name')->nullable();
            $table->string('apartment_number')->nullable();
            $table->string('floor_number')->nullable();
            $table->string('landmark')->nullable();
            $table->string('state_code')->nullable();
            $table->string('state_name')->nullable();
            $table->string('country_code')->nullable();
            $table->string('country_name')->nullable();
            $table->string('zip_code')->nullable();
            $table->string('street_address')->nullable();
            $table->string('street_address2')->nullable();
            //
            $table->string('state')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('neighborhood')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('featured')->nullable();
            $table->string('hot')->nullable();
            $table->integer('agent_id')->nullable();
            $table->string('status')->nullable();
            //auto fiends for created by and updated by
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            //auto fiends for soft delete
            $table->integer('deleted_by')->nullable();
            $table->dateTime('deleted_at')->nullable();
            $table->string('deleted_reason')->nullable();
            $table->integer('deleted_status')->nullable();
            //auto fiends for soft statistics 
            $table->integer('view_count')->default(0);
            $table->integer('like_count')->default(0);
            $table->integer('dislike_count')->default(0);
            $table->integer('comment_count')->default(0);
            $table->integer('share_count')->default(0);
            $table->integer('save_count')->default(0);
            $table->integer('report_count')->default(0);
            $table->integer('favorite_count')->default(0);
            $table->integer('bookmark_count')->default(0);
            $table->integer('follow_count')->default(0);
            $table->integer('unfollow_count')->default(0);
            $table->integer('block_count')->default(0);
            $table->integer('unblock_count')->default(0);
            $table->integer('hide_count')->default(0);
            $table->integer('unhide_count')->default(0);
            $table->integer('report_status')->default(0);
            $table->integer('report_reason')->default(0);
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('properties');
    }
};
