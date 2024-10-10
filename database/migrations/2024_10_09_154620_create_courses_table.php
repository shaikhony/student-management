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
        Schema::create('courses', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('status', ['نشط', 'متوقف مؤقتاً', 'منتهي'])->default('نشط');
            $table->string('subject_type');
            $table->integer('num_lessons');
            $table->date('start_date');
            $table->date('end_date');
            $table->integer('max_student');
            $table->integer('min_student');
            $table->integer('duration'); // مدة الكورس
            $table->foreignId('teacher_id')->nullable()->constrained()->onDelete('set null'); // تعيين المفتاح الأجنبي إلى null عند الحذف
            $table->foreignId('subject_id')->nullable()->constrained()->onDelete('set null'); // تعيين المفتاح الأجنبي إلى null عند الحذف
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // حذف جدول courses
        Schema::dropIfExists('courses');
    }
};
