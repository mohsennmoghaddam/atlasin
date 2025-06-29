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
        Schema::create('abouts', function (Blueprint $table) {
            $table->id();
            $table->string('main_image');                  // تصویر اصلی

            // فیلدهای چندزبانه
            $table->json('title');                         // {"fa": "...", "en": "..."}
            $table->json('subtitle');
            $table->json('final_paragraph');

            // تجربه
            $table->string('experience_years');            // مثلاً "36"
            $table->json('experience_text_top')->nullable();
            $table->json('experience_text_bottom')->nullable();

            // تماس
            $table->string('call_us_image')->nullable();   // عکس تماس
            $table->json('call_us_text')->nullable();      // شماره تماس

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('abouts');
    }
};
