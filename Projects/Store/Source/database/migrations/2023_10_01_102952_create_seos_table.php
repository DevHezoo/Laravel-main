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
        Schema::create('seos', function (Blueprint $table) {
            $table->id();

            $table->text('meta_website')->nullable();
            $table->text('meta_title')->nullable();
            $table->text('meta_author')->nullable();
            $table->text('meta_keyword')->nullable();
            $table->text('meta_description')->nullable();
            $table->text('meta_icon')->nullable();

            $table->text('meta_email')->nullable();
            $table->text('meta_phone')->nullable();
            $table->text('meta_address')->nullable();
            $table->text('meta_address_2')->nullable();
            $table->text('open_time')->nullable();
            
            $table->text('Stripe_Publishable_Key')->nullable();
            $table->text('Stripe_Secret_Key')->nullable();

            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('seos');
    }
};
