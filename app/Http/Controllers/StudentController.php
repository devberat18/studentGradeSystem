<?php

namespace App\Http\Controllers;

class StudentController
{
    public function index(){

        return view('admin.student.home');
    }
}
