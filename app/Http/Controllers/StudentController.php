<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class StudentController
{
    public function index()
    {
        $students = Students::all();
        return view('admin.student.home')->with(['students' => $students]);
    }

    public function add()
    {
        return view('admin.student.add');
    }

    public function create(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'school_number' => 'required|string|max:255',
            'school_grade' => 'required|string|max:255',
            'birth_date' => 'required',
            'gender' => 'required',
        ]);

        $attributes = $request->only([
            'name',
            'surname',
            'school_number',
            'school_grade',
            'birth_date',
            'gender'
        ]);

        $students = Students::create($attributes);

        return redirect('/student')->with('success', 'true');
    }

    public function edit($id)
    {
        $student = Students::find($id);


        session()->flashInput([
            'name' => $student->name,
            'surname' => $student->surname,
            'school_number' => $student->school_number,
            'school_grade' => $student->school_grade,
            'gender' => $student->gender,
            'birth_date' => $student->birth_date,

        ]);

        return view('admin.student.add')->with(['student' => $student, 'action' => 'edit']);
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'school_number' => 'required|string|max:255',
            'school_grade' => 'required|string|max:255',
            'birth_date' => 'required',
            'gender' => 'required',
        ]);

        $attributes = $request->only([
            'name',
            'surname',
            'school_number',
            'school_grade',
            'birth_date',
            'gender'
        ]);

        Students::find($id)->update($attributes);

        return redirect('/student')->with('success', 'true');
    }

    public function delete($id)
    {
        if ($id) {
            Students::find($id)->delete();
        }

        return redirect('/student')->with('deleted', 'true');
    }
}
