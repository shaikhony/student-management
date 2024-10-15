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
    Schema::table('students', function (Blueprint $table) {
        $table->foreignId('country_id') // عمود العلاقة
              ->after('age') // إضافة العمود بعد العمر
              ->constrained('countries') // ربطه بجدول countries
              ->onDelete('cascade'); // حذف الطلاب المرتبطين بالدولة المحذوفة
    });
}

public function down(): void
{
    Schema::table('students', function (Blueprint $table) {
        $table->dropColumn('country_id'); // حذف العمود في حالة الرجوع إلى النسخة السابقة
    });
}

};
