<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\StudentGrades;
use App\Models\Students;
use Illuminate\Http\Request;

class IndexController
{

    public function index()
    {
        return view('welcome');
    }

    public function student_grades()
    {
        return view('student_grades');
    }

    public function student_grades_post(Request $request)
    {

        $request->validate([
            'school_number' => 'required',
        ]);

        $school_number = $request->input('school_number');
        $student = json_decode(Students::where('school_number', $school_number)->first()->get());

        if (!$student) {
            return view('student_grades')->with(['error' => 'Student not found']);
        }

        $student_grades = StudentGrades::where('student_id', $student[0]->id)->get();
        $student_grades_array = [];
        foreach ($student_grades as $student_grade) {
            $course = Courses::find($student_grade->course_id);

            $student_grades_array = [
                ...$student_grades_array,
                [
                    'id' => $student_grade->id,
                    'student' => $student[0]->name . " " . $student[0]->surname,
                    'course' => $course->course_name,
                    'school_term' => $student_grade->school_term,
                    'course_note' => $student_grade->course_note,
                    'exam_type' => $student_grade->exam_type,
                ]
            ];
        }

        return view('student_grades')->with(['student_grades' => $student_grades_array]);
    }

    public function grade_point_averages()
    {
        return view('grade_point_averages');
    }

    public function grade_point_averages_post(Request $request)
    {
        $request->validate([
            'school_number' => 'required',
        ]);

        $school_number = $request->input('school_number');

        $student = Students::where('school_number', $school_number)->first();

        if (!$student) {
            return view('grade_point_averages')->with(['error' => 'Student not found']);
        }

        $weightedAverage = $student->weightedAverage();

        $student_course_grade = [
            "student" => $student->name . " " . $student->surname,
            "average" => $weightedAverage
        ];

        return view('grade_point_averages')->with('students_course_grade', $student_course_grade);
    }

}