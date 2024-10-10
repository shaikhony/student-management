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
}

