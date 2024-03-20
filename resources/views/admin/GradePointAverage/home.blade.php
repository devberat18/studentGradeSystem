@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            Öğrenci Genel Ağırlıklı Not Listesi
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table data-table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">Öğrenci</th>
                                <th scope="col">Ağırlıklı Genel Not Ortalaması</th>
                            </tr>
                            </thead>
                            <tbody>

                            @isset($students_course_grades)
                                @foreach($students_course_grades as $students_course_grade)
                                    <tr>
                                        <td scope="row">{{$students_course_grade["student"]}}</td>
                                        <td scope="row">{{$students_course_grade["average"]}}</td>
                                    </tr>
                                @endforeach
                            @endisset

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

