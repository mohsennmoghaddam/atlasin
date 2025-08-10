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
        Schema::create('homecare_product_cards', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->nullable(); // عکس آیکون
            $table->json('title')->nullable(); // عنوان دوبل زبانه
            $table->json('description')->nullable(); // توضیح
            $table->string('slug')->nullable(); // برای لینک به صفحه محصول
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homecare_product_cards');
    }
};
