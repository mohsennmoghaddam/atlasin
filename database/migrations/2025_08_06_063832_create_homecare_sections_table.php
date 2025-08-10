<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('homecare_sections', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // مثل: intro
            $table->json('title');           // {'fa': 'متن فارسی', 'en': 'English title'}
            $table->json('body');            // {'fa': 'متن فارسی', 'en': 'English body'}
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('homecare_sections');
    }
};
