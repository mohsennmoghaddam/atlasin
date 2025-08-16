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
        Schema::create('faqs', function (Blueprint $table) {
            $table->id();
            // nullable: FAQ کلی (بدون کتگوری) هم داشته باشیم
            $table->foreignId('category_id')
                ->nullable()
                ->constrained('hospital_categories')
                ->nullOnDelete();

            $table->json('question'); // {fa,en}
            $table->json('answer');   // {fa,en} (HTML با ادیتور)
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
        Schema::dropIfExists('faqs');
    }
};
