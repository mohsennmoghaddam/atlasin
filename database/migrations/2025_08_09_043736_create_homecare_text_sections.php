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
        Schema::create('homecare_text_sections', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // مثلا: post_cards_text
            $table->json('title')->nullable(); // {fa:..., en:...}
            $table->json('body')->nullable();  // {fa:..., en:...} — HTML از ادیتور
            $table->unsignedInteger('order')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homecare_text_sections');
    }
};
