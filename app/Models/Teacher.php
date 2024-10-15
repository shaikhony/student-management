<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use CrudTrait;
    use HasFactory;

    protected $table = 'teachers';
    protected $guarded = ['id'];
    protected $fillable = ['name', 'spec_id', 'note'];

    public function courses()
    {
        return $this->hasMany(Course::class); // علاقة مع نموذج Course
    }

    public function spec(){
        return $this->belongsTo(Spec::class);
    }

}

