<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function getTeacher()
    {
        return $this->belongsTo(Teacher::class, 'teacher_id', 'id');
    }
}
