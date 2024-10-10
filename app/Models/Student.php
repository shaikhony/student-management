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
    protected $fillable = ['name', 'age', 'country', 'phone_number', 'status'];

    // public function subjects()
    // {
    //     return $this->belongsToMany(Subject::class, 'student_courses')
    //         ->withPivot('payment_status', 'payment_method')->withTimestamps();
    // }
}

