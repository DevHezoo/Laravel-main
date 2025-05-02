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

            $table->text('name')->unique();
            $table->text('username')->unique();
            $table->text('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->text('password');

            // User Profile
            $table->text('photo')->nullable();
            $table->text('phone')->nullable();
            $table->text('address')->nullable();
            $table->text('social_link')->nullable();
            $table->text('vendor_join')->nullable();
            $table->text('vendor_short_info')->nullable()->default('Short Description');


            // Spatie {Roles, Permissions}
            $table->enum('role', ['admin', 'vendor', 'delivery', 'user'])->default('user');
            $table->enum('status', ['active', 'inactive'])->default('inactive');

            // User Online
            $table->timestamp('last_seen')->nullable();

            // Rest API
            $table->text('token')->nullable();
            $table->text('code')->nullable();

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
