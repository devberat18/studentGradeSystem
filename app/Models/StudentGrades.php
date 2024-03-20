<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentGrades extends Model
{
    use HasFactory;


    protected $table = 'student_grades';

    protected $fillable = [
        'student_id',
        'course_id',
        'school_term',
        'course_note',
        'exam_type',
    ];

    public function get_courses()
    {
        return $this->hasMany(Courses::class, 'id', 'course_id');
    }

}
