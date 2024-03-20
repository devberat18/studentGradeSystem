@extends('admin.layouts.app')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <div>
                            @if(isset($action) && $action === 'edit')
                                Düzenle
                            @else
                                Ekle
                            @endif
                        </div>
                    </div>
                    <div class="card-body">
                        @if(isset($action) && $action === 'edit')
                            <form method="POST" action="{{ url('student-grades/edit/'. $student_grade->id) }}"
                                  enctype="multipart/form-data">
                                @method('PATCH')
                                @else

                                    <form method="POST" action="{{ url('student-grades/add') }}"
                                          enctype="multipart/form-data">
                                        @endif
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                @component('components.form.input', ['name' => 'school_term', 'label' => 'Okul Dönemi'])@endcomponent
                                            </div>
                                            <div class="col-md-3">
                                                @component('components.form.input', ['name' => 'course_note', 'label' => 'Ders Notu'])@endcomponent
                                            </div>
                                            <div class="col-md-3">
                                                @component('components.form.input', ['name' => 'letter_note', 'label' => 'Harf Notu'])@endcomponent
                                            </div>
                                            <div class="col-md-6">
                                                @component('components.form.select', ['name' => 'student_id', 'label' => 'Öğrenci', 'options' => $students_option])@endcomponent
                                            </div>
                                            <div class="col-md-6">
                                                @component('components.form.select', ['name' => 'course_id', 'label' => 'Ders', 'options' => $courses_option])@endcomponent
                                            </div>
                                        </div>
                                        <div class="text-right" style="margin-top: 1rem">
                                            <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                               href="#saveModal">
                                                <i class="fas fa-trash mr-2"></i>
                                                Kaydet
                                            </a>
                                            <a class="btn btn-outline-dark" href="{{ url('/student-grades/') }}">İptal</a>
                                        </div>
                                        <div class="modal fade" id="saveModal" tabindex="-1"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Uyarı</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Kaydetmek istediğinize emin misiniz?
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">İptal
                                                        </button>
                                                        <button class="btn btn-success">Evet</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection