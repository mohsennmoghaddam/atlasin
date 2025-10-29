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
        Schema::create('gallery_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('gallery_category_id')->constrained('gallery_categories')->onDelete('cascade');
            $table->string('image');               // مسیر یا نام فایل
            $table->json('title')->nullable();     // {fa:, en:}
            $table->json('caption')->nullable();   // {fa:, en:} — توضیح یا متن کامل (HTML اگر خواستی)
            $table->string('file')->nullable();    // برای PDF یا کاتالوگ مرتبط
            $table->unsignedInteger('order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_items');
    }
};
