<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'subjects';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'level', 'stage'];

    public function courses()
    {
        return $this->hasMany(Course::class); // علاقة مع نموذج Course
    }
}


