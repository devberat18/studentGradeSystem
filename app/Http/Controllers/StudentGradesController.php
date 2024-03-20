<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\StudentGrades;
use App\Models\Students;
use Illuminate\Http\Request;

class StudentGradesController
{
    public function index()
    {
        $student_grades = StudentGrades::all();
        $student_grades_array = [];

        foreach ($student_grades as $student_grade) {
            $student = Students::find($student_grade->student_id);
            $course = Courses::find($student_grade->course_id);

            $student_grades_array = [
                ...$student_grades_array,
                [
                    'id' => $student_grade->id,
                    'student' => $student->name." ".$student->surname,
                    'course' => $course->course_name,
                    'school_term' => $student_grade->school_term,
                    'course_note' => $student_grade->course_note,
                    'letter_note' => $student_grade->letter_note,
                ]
            ];
        }


        return view('admin.StudentGrades.home')->with(['student_grades' => $student_grades_array]);
    }

    public function add()
    {
        $students = Students::all();
        $students_option = [
            [
                'label' => "Öğrenci Seçiniz",
                'value' => ""
            ]
        ];
        foreach ($students as $student) {
            $students_option = [
                ...$students_option,
                [
                    'label' => $student->name . " " . $student->surname,
                    'value' => $student->id
                ]
            ];
        }


        $courses = Courses::all();
        $courses_option = [
            [
                'label' => "Ders Seçiniz",
                'value' => ""
            ]
        ];
        foreach ($courses as $course) {
            $courses_option = [
                ...$courses_option,
                [
                    'label' => $course->course_name,
                    'value' => $course->id
                ]
            ];
        }

        return view('admin.StudentGrades.add')->with(['students_option' => $students_option, 'courses_option' => $courses_option]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'course_id' => 'required|integer',
            'school_term' => 'required|string|max:255',
            'course_note' => 'required',
            'letter_note' => 'required',
        ]);

        $attributes = $request->only([
            'student_id',
            'course_id',
            'school_term',
            'course_note',
            'letter_note'
        ]);

        $student_grades = StudentGrades::create($attributes);

        return redirect('/student-grades')->with('success', 'true');
    }

    public function edit($id)
    {
        $student_grade = StudentGrades::find($id);

        session()->flashInput([
            'student_id' => $student_grade->student_id,
            'course_id' => $student_grade->course_id,
            'school_term' => $student_grade->school_term,
            'course_note' => $student_grade->course_note,
            'letter_note' => $student_grade->letter_note,
        ]);

        $students = Students::all();
        $students_option = [
            [
                'label' => "Öğrenci Seçiniz",
                'value' => ""
            ]
        ];
        foreach ($students as $student) {
            $students_option = [
                ...$students_option,
                [
                    'label' => $student->name . " " . $student->surname,
                    'value' => $student->id
                ]
            ];
        }


        $courses = Courses::all();
        $courses_option = [
            [
                'label' => "Ders Seçiniz",
                'value' => ""
            ]
        ];
        foreach ($courses as $course) {
            $courses_option = [
                ...$courses_option,
                [
                    'label' => $course->course_name,
                    'value' => $course->id
                ]
            ];
        }

        return view('admin.StudentGrades.add')->with(['student_grade' => $student_grade, 'action' => 'edit', 'students_option' => $students_option, 'courses_option' => $courses_option]);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'student_id' => 'required|integer',
            'course_id' => 'required|integer',
            'school_term' => 'required|string|max:255',
            'course_note' => 'required',
            'letter_note' => 'required',
        ]);

        $attributes = $request->only([
            'student_id',
            'course_id',
            'school_term',
            'course_note',
            'letter_note'
        ]);

        StudentGrades::find($id)->update($attributes);

        return redirect('/student-grades')->with('success', 'true');
    }

    public function delete($id)
    {
        if ($id) {
            StudentGrades::find($id)->delete();
        }

        return redirect('/student-grades')->with('deleted', 'true');
    }
}


