@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            Öğrenci Listesi
                        </div>
                        <div>
                            <a type="button" class="btn btn-success text-white" href="{{ url('student/add') }}">
                                <i class="fas fa-plus-circle pr-2" aria-hidden="true"></i>
                                Öğrenci Ekle
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table data-table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">İsim</th>
                                <th scope="col">Soy İsim</th>
                                <th scope="col">Okul Numarası</th>
                                <th scope="col">Sınıfı</th>
                                <th scope="col">Cinsiyet</th>
                                <th scope="col">Doğum Tarihi</th>
                                <th scope="col"></th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @isset($students)
                                @foreach($students as $student)
                                    <tr>
                                        <td scope="row">{{$student->id}}</td>
                                        <td scope="row">{{$student->name}}</td>
                                        <td scope="row">{{$student->surname}}</td>
                                        <td scope="row">{{$student->school_number}}</td>
                                        <td scope="row">{{$student->school_grade}}</td>
                                        <td scope="row">{{$student->gender == "m" ? "Erkek" : "Kız" }}</td>
                                        <td scope="row">{{$student->birth_date}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ url('student/edit/'.$student->id) }}"
                                               id="editButton{{ $student->id }}">
                                                <i class="fas fa-edit mr-2"></i>
                                                Düzenle
                                            </a>
                                        </td>
                                        <td>
                                            <a type="button" class="btn btn-danger" href="#deleteModal{{$student->id}}"
                                               data-bs-toggle="modal">
                                                <i class="fas fa-trash mr-2"></i>
                                                Sil
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="deleteModal{{$student->id}}" tabindex="-1"
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
                                                    <a href="{{ url('student/delete/'.$student->id) }}"
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

