@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            Ders Listesi
                        </div>
                        <div>
                            <form method="POST" action="{{ url('student-grade') }}">
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
                                <th scope="col">#</th>
                                <th scope="col">Öğrenci</th>
                                <th scope="col">Ders</th>
                                <th scope="col">Dönemi</th>
                                <th scope="col">Sınav Türü</th>
                                <th scope="col">Ders Notu</th>
                                <th scope="col"></th>
                                <th scope="col"></th>

                            </tr>
                            </thead>
                            <tbody>
                            @isset($student_grades)
                                @foreach($student_grades as $student_grade)
                                    <tr>
                                        <td scope="row">{{$student_grade["id"]}}</td>
                                        <td scope="row">{{$student_grade["student"]}}</td>
                                        <td scope="row">{{$student_grade["course"]}}</td>
                                        <td scope="row">{{$student_grade["school_term"]}}</td>
                                        <td scope="row">{{$student_grade["exam_type"]}}</td>
                                        <td scope="row">{{$student_grade["course_note"]}}</td>
                                        <td>
                                            <a class="btn btn-primary"
                                               href="{{ url('student-grades/edit/'.$student_grade["id"]) }}"
                                               id="editButton{{ $student_grade["id"] }}">
                                                <i class="fas fa-edit mr-2"></i>
                                                Düzenle
                                            </a>
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-danger"
                                               href="#deleteModal{{$student_grade["id"]}}"
                                               data-bs-toggle="modal">
                                                <i class="fas fa-trash mr-2"></i>
                                                Sil
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="deleteModal{{$student_grade["id"]}}" tabindex="-1"
                                         aria-labelledby="exampleModalLabel"
                                         aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Uyarı</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Silmek istediğinize emin misiniz?
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">İptal
                                                    </button>
                                                    <a href="{{ url('student-grades/delete/'.$student_grade["id"]) }}"
                                                       class="btn btn-danger">Evet</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

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