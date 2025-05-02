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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('division_id');
            $table->unsignedBigInteger('district_id');
            $table->unsignedBigInteger('state_id');
            $table->text('name')->nullable();
            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->text('adress')->nullable();
            $table->text('post_code')->nullable();
            $table->text('note')->nullable();
            $table->text('payment_method');
            $table->text('transaction_id');
            $table->text('currency');
            $table->double('amount',8,2);
            $table->text('order_number')->nullable();
            $table->text('invoice_no');
            $table->text('order_date');
            $table->text('order_month');
            $table->text('order_year');
            $table->text('confirmed_date')->nullable();
            $table->text('processing_date')->nullable();
            $table->text('picked_date')->nullable();
            $table->text('shipped_date')->nullable();
            $table->text('delivered_date')->nullable();
            $table->text('cancel_date')->nullable();
            $table->text('return_date')->nullable();
            $table->text('return_reason')->nullable();
            $table->text('send_as');
            $table->text('status');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
