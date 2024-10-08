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
        Schema::create('students', function (Blueprint $table) {
            $table->id(); // رقم فريد لكل طالب
            $table->string('name'); // الاسم النصي
            $table->integer('age'); // العمر كعدد صحيح
            $table->string('country'); // البلد، قائمة منسدلة
            $table->string('phone_number'); // رقم الهاتف بصيغة دولية
            $table->enum('status', ['نشط', 'محتمل', 'متوقف', 'منسحب']); // حالة الطالب

            $table->timestamps(); // حفظ وقت الإنشاء والتعديل
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
