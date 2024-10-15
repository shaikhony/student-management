<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'courses';
    protected $guarded = ['id'];
    protected $fillable = [
        'name',
        'status',
        'subject_type',
        'num_lessons',
        'start_date',
        'end_date',
        'max_student',
        'min_student',
        'duration',
        'teacher_id',
        'subject_id',
    ];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class); // علاقة مع نموذج Teacher
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class); // علاقة مع نموذج Subject
    }

    public function students()
    {
        return $this->belongsToMany(Student::class, 'course_student', 'course_id', 'student_id');
    }

     // استخدام حدث saved لتحديث عدد الطلاب
     protected static function booted()
     {
         static::saved(function ($course) {
             // حساب عدد الطلاب المرتبطين بهذا الكورس
             $currentStudentsCount = $course->students()->count();
 
             // تحديث حقل number_student في الكورس
             $course->number_student = $currentStudentsCount;
             $course->saveQuietly(); // استخدم saveQuietly لتجنب إطلاق حدث saved مرة أخرى
         });
     }
}

