<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spec extends Model
{
    use HasFactory;
    protected $table = 'specs';
    protected $guarded = ['id'];
    protected $fillable = ['spec_name'];

    public function teachers(){
        return $this->hasMany(Teacher::class);
    }
}
