<?php

namespace App\Http\Controllers;

use App\Models\Courses;
use App\Models\Students;
use Illuminate\Http\Request;

class CourseController
{
    public function index()
    {
        $courses = Courses::all();
        return view('admin.course.home')->with(['courses' => $courses]);
    }

    public function add()
    {
        return view('admin.course.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_hours' => 'required|integer',
            'course_credit' => 'required|integer',
        ]);

        $attributes = $request->only([
            'course_name',
            'course_hours',
            'course_credit'
        ]);

        $students = Courses::create($attributes);

        return redirect('/course')->with('success', 'true');
    }

    public function edit($id)
    {
        $course = Courses::find($id);


        session()->flashInput([
            'course_name' => $course->course_name,
            'course_hours' => $course->course_hours,
            'course_credit' => $course->course_credit,
        ]);

        return view('admin.course.add')->with(['course' => $course, 'action' => 'edit']);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'course_name' => 'required|string|max:255',
            'course_hours' => 'required|integer',
            'course_credit' => 'required|integer',
        ]);

        $attributes = $request->only([
            'course_name',
            'course_hours',
            'course_credit'
        ]);

        Courses::find($id)->update($attributes);

        return redirect('/course')->with('success', 'true');
    }

    public function delete($id)
    {
        if ($id) {
            Courses::find($id)->delete();
        }

        return redirect('/course')->with('deleted', 'true');
    }
}