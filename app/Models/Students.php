<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $table = 'students';

    protected $fillable = [
        'name',
        'surname',
        'school_number',
        'school_grade',
        'birth_date',
        'gender'
    ];

    public function grades()
    {
        return $this->hasMany(StudentGrades::class, 'student_id', 'id');
    }

    public function weightedAverage()
    {
        $totalCredit = 0;
        $weightedTotal = 0;

        foreach ($this->grades as $grade) {
            $course = json_decode($grade->get_courses);
            $totalCredit += $course[0]->course_credit;
            $weightedTotal += $grade->course_note * $course[0]->course_credit;
        }

        if ($totalCredit == 0) {
            return 0;
        }

        $grade_point_average = $weightedTotal / $totalCredit;

        return number_format($grade_point_average, 2);
    }
}
