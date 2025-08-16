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
        Schema::create('hospital_category_images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('category_id')
                ->constrained('hospital_categories')->onDelete('cascade');
            $table->string('image');      // storage path
            $table->json('title')->nullable(); // {fa,en}
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
        Schema::dropIfExists('hospital_category_images');
    }
};
