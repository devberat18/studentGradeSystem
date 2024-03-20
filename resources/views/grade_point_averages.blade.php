@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <form method="POST" action="{{ url('grade-point-average') }}">
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        @component('components.form.input', ['name' => 'school_number'])@endcomponent
                                    </div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-success">Ara
                                        </button>
                                    </div>
                                </div>
                            </form>
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
                            @isset($students_course_grade)
                                <tr>
                                    <td scope="row">{{$students_course_grade["student"]}}</td>
                                    <td scope="row">{{$students_course_grade["average"]}}</td>
                                </tr>
                            @endisset
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection