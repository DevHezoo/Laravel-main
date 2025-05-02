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
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            // brand_id, catagory, subcategory, product_name, product_slug, product_code, product_qty, product_tag, product_size, product_color, product_price, discount_price, short_desc, long_desc, product_thumbnail, vendor_id, hot_deals, featured, special_offer, special_deals, status, country

            $table->integer('brand_id');
            $table->integer('category');
            $table->integer('subcategory');
            $table->text('product_name');
            $table->text('product_slug');
            $table->integer('product_code');
            $table->integer('product_qty');
            $table->text('product_tag')->nullable();
            $table->text('product_size');
            $table->text('product_color');
            $table->integer('product_price');
            $table->integer('discount_price');
            $table->text('short_desc')->nullable();
            $table->text('long_desc')->nullable();
            $table->text('product_thumbnail'); // uploade/img/product1.png
            $table->integer('vendor_id');
            $table->integer('hot_deals')->nullable(); //1, 0
            $table->integer('featured')->nullable(); //1, 0
            $table->integer('special_offer')->nullable(); //1, 0
            $table->integer('special_deals')->nullable(); //1, 0
            $table->integer('status')->nullable();
            $table->text('country'); // Egypt, United Arab Emirates,... etc

            $table->timestamps();// Updated_at, Crated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
