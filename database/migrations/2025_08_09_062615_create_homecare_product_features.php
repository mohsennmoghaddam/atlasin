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
        Schema::create('homecare_product_features', function (Blueprint $table) {
            $table->id();
            $table->json('title');        // نام محصول (fa/en)
            $table->json('intro');        // متن کوتاه زیر عنوان (fa/en)
            $table->string('image')->nullable();        // تصویر دایره‌ای بزرگ
            $table->json('model_title');  // “مدل دستگاه: …” (fa/en)
            $table->json('specs');        // مشخصات/متن (fa/en) — HTML
            $table->string('catalog')->nullable();      // فایل کاتالوگ (pdf/…)
            $table->unsignedInteger('order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homecare_product_features');
    }
};
