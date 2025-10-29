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
        Schema::table('sliders', function (Blueprint $table) {
            // ستون جدید اضافه می‌کنیم
            $table->string('image_fa')->nullable()->after('description');
            $table->string('image_en')->nullable()->after('image_fa');

            // اگه می‌خوای ستون قدیمی image حذف بشه:
            $table->dropColumn('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sliders', function (Blueprint $table) {
            // برای برگشت به حالت قبل
            $table->string('image')->nullable()->after('description');

            $table->dropColumn(['image_fa', 'image_en']);
        });
    }
};
