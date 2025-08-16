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
        Schema::create('hospital_categories', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();     // آدرس یکتا برای صفحه کتگوری (EN-only)
            $table->json('title');                // {fa:..., en:...}
            $table->json('subtitle')->nullable(); // {fa:..., en:...} (اختیاری، برای نمایش روی هاور)
            $table->string('icon');               // تصویر آیکون/دایره
            $table->unsignedInteger('order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_categories');
    }
};
