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
        Schema::create('hospital_category_stages', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained('hospital_categories')->onDelete('cascade');
            $table->json('title');             // {fa,en}
            $table->json('body')->nullable();  // {fa,en} (HTML از CKEditor)
            $table->string('image')->nullable(); // تصویر کنار متن
            $table->unsignedInteger('order')->default(1);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hospital_category_stages');
    }
};
