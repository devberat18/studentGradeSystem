@extends('admin.layouts.app')
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
                            <a type="button" class="btn btn-success text-white" href="{{ url('course/add') }}">
                                <i class="fas fa-plus-circle pr-2" aria-hidden="true"></i>
                                Ders Ekle
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table data-table">
                            <thead class="thead-dark">
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Ders Adı</th>
                                <th scope="col">Haftalık Ders Saati</th>
                                <th scope="col">Ders Kredisi</th>
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>

                            @isset($courses)
                                @foreach($courses as $course)
                                    <tr>
                                        <td scope="row">{{$course->id}}</td>
                                        <td scope="row">{{$course->course_name}}</td>
                                        <td scope="row">{{$course->course_hours}}</td>
                                        <td scope="row">{{$course->course_credit}}</td>
                                        <td>
                                            <a class="btn btn-primary" href="{{ url('course/edit/'.$course->id) }}"
                                               id="editButton{{ $course->id }}">
                                                <i class="fas fa-edit mr-2"></i>
                                                Düzenle
                                            </a>
                                            <a type="button" class="btn btn-danger" href="#deleteModal{{$course->id}}"
                                               data-bs-toggle="modal">
                                                <i class="fas fa-trash mr-2"></i>
                                                Sil
                                            </a>
                                        </td>
                                    </tr>

                                    <div class="modal fade" id="deleteModal{{$course->id}}" tabindex="-1"
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
                                                    <a href="{{ url('course/delete/'.$course->id) }}"
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

