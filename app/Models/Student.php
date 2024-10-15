<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'students';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'age','country_id', 'phone_number', 'status'];

    public function courses()
    {
        return $this->belongsToMany(Course::class, 'course_student', 'student_id', 'course_id');
    }

    public function country(){
        return $this->belongsTo(Country::class);
    }
}

