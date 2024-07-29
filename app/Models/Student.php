<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'nis',
        'classroom_id',
        'image',
    ];

    public function getClassroom()
    {
        return $this->belongsTo(Classroom::class, 'classroom_id', 'id');
    }

    public function getSubjects()
    {
        return $this->belongsToMany(Subject::class)->withPivot('subject_id', 'student_id');
    }
}
