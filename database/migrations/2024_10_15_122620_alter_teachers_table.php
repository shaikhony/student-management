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
        Schema::table('teachers', function (Blueprint $table) {
            // حذف العمود القديم
            $table->dropColumn('special');
            $table->foreignId('spec_id')->after('name')->constrained('specs')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
{
    Schema::table('teachers', function (Blueprint $table) {
        // حذف المفتاح الخارجي والعمود المرتبط به
        $table->dropForeign(['spec_id']);
        $table->dropColumn('spec_id');

        // إعادة العمود القديم 'special'
        $table->string('special')->after('name');
    });
}

};
