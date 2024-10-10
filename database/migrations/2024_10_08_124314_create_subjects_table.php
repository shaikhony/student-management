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
        Schema::create('subjects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('level',['مستوى اول','مستوى ثاني','مستوى ثالث','مستوى متقدم']);
            $table->string('stage');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // إزالة المفتاح الأجنبي من جدول courses
Schema::table('courses', function (Blueprint $table) {
    $table->dropForeign(['subject_id']); // استبدل 'subject_id' باسم العمود المناسب
});

// بعد إزالة المفتاح الأجنبي، يمكنك حذف جدول subjects
Schema::dropIfExists('subjects');

    }
};
