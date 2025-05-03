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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('phone')->unique();
            //address 
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
            //contract info 
            $table->string('contract_number')->nullable();
            $table->string('contract_start_date')->nullable();
            $table->string('contract_end_date')->nullable();
            $table->string('contract_status')->nullable();
            $table->string('contract_type')->nullable();
            $table->string('contract_value')->nullable();
            $table->string('contract_currency')->nullable();
            $table->string('contract_description')->nullable();
            $table->string('contract_terms')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            //user role 
            $table->enum('role',['admin','agent','developer','client','user','stuff'])->default('user'); // admin, user, guest
            //user status
            $table->enum('status',['active','inactive','suspended'])->default('active'); // active, inactive, suspended
            //user type
            $table->enum('user_type',['demo','real'])->default('real'); // demo, real
            //user image
            $table->string('photo')->nullable();
            //user bio
            $table->text('bio')->nullable();
            //user social media links
            $table->string('facebook')->nullable();
            $table->string('twitter')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('instagram')->nullable();
            $table->string('youtube')->nullable();
            $table->string('tiktok')->nullable();
            //user preferences
            $table->string('language')->default('en'); // default language
            $table->string('timezone')->default('UTC'); // default timezone
            $table->string('currency')->default('USD'); // default currency
            $table->string('date_format')->default('Y-m-d'); // default date format
            $table->string('time_format')->default('H:i'); // default time format
            //user settings
            $table->boolean('two_factor_auth')->default(false); // two factor authentication
            $table->boolean('email_notifications')->default(true); // email notifications
            $table->boolean('sms_notifications')->default(true); // sms notifications
            $table->boolean('push_notifications')->default(true); // push notifications

            //user notifications
            $table->boolean('email_verified')->default(false); // email verified
            $table->boolean('phone_verified')->default(false); // phone verified
            $table->boolean('is_subscribed')->default(false); // is subscribed
            $table->boolean('is_blocked')->default(false); // is blocked

            //user activity log
            $table->text('last_login')->nullable(); // last login
            $table->text('last_logout')->nullable(); // last logout
            $table->text('last_activity')->nullable(); // last activity
            $table->text('last_ip')->nullable(); // last ip
            $table->text('last_device')->nullable(); // last device
            $table->text('last_location')->nullable(); // last location

            //user privacy settings
            $table->boolean('show_email')->default(true); // show email
            $table->boolean('show_phone')->default(true); // show phone
            $table->boolean('show_address')->default(true); // show address
            $table->boolean('show_profile')->default(true); // show profile
            $table->boolean('show_social_links')->default(true); // show social links
            $table->boolean('show_bio')->default(true); // show bio
            $table->boolean('show_profile_picture')->default(true); // show profile picture 
            $table->boolean('show_last_login')->default(true); // show last login
            $table->boolean('show_last_activity')->default(true); // show last activity
            //user account settings
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
