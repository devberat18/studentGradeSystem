<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\StudentGrades;
use App\Models\Students;
use Illuminate\Http\Request;

class GradePointAveragesController
{
    public function index()
    {
        $students = Students::all();

        $students_course_grades = [];

        foreach ($students as $student) {
            $students_course_grades =  [
              ...$students_course_grades,
              [
                  "student" => $student->name . " " . $student->surname,
                  "average" => $student->weightedAverage(),
              ]
            ];
        }

        return view('admin.GradePointAverage.home')->with('students_course_grades', $students_course_grades);
    }

    public function get_student_course_grade($student_id)
    {
        $student = Students::find($student_id);
        $weightedAverage = $student->weightedAverage();

        return view('admin.StudentGrades.home');
    }
}