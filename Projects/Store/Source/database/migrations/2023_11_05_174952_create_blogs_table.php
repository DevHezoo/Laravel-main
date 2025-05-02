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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->text('author_id');
            $table->text('views');
            $table->text('comments');
            $table->text('title');
            $table->text('short_description');
            $table->text('long_description');
            $table->text('blog_url');
            $table->text('thumbnail');
            $table->text('img_1');
            $table->text('img_2');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
