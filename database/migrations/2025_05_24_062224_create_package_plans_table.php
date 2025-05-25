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
        Schema::create('package_plans', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('package_name');
            $table->string('invoice');
            $table->string('package_price');
            $table->string('package_duration')->nullable();
            $table->string('package_status')->nullable();;
            $table->date('package_start_date')->nullable();;
            $table->date('package_end_date')->nullable();;
            $table->string('package_description')->nullable();;
            $table->integer('package_is_offer')->nullable();;
            $table->string('promo_code')->nullable();
            //CRT DATE
            $table->string('created_by')->nullable();
            $table->string('updated_by')->nullable();
            //CRT User
            $table->string('created_user')->nullable();
            $table->string('updated_user')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_plans');
    }
};
