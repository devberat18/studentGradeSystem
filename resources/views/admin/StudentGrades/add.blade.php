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
                                            <div class="col-md-4">
                                                @component('components.form.select',
                                                    ['name' => 'school_term', 'label' => 'Dönem',
                                                    'required' => 'true',
                                                    'placeholder' => 'Dönem Seçiniz',
                                                    'options' => [
                                                    ['label' => '1. Sınıf Güz Dönemi', 'value' => "1. Sınıf Güz Dönemi"],
                                                    ['label' => '1. Sınıf Bahar Dönemi', 'value' => "1. Sınıf Bahar Dönemi"],
                                                    ['label' => '1. Sınıf Yaz Dönemi', 'value' => "1. Sınıf Yaz Dönemi"],

                                                    ['label' => '---------------------------', 'value' => ""],

                                                    ['label' => '2. Sınıf Güz Dönemi', 'value' => "2. Sınıf Güz Dönemi"],
                                                    ['label' => '2. Sınıf Bahar Dönemi', 'value' => "2. Sınıf Bahar Dönemi"],
                                                    ['label' => '2. Sınıf Yaz Dönemi', 'value' => "2. Sınıf Yaz Dönemi"],

                                                    ['label' => '---------------------------', 'value' => ""],

                                                    ['label' => '3. Sınıf Güz Dönemi', 'value' => "3. Sınıf Güz Dönemi"],
                                                    ['label' => '3. Sınıf Bahar Dönemi', 'value' => "3. Sınıf Bahar Dönemi"],
                                                    ['label' => '3. Sınıf Yaz Dönemi', 'value' => "3. Sınıf Yaz Dönemi"],

                                                    ['label' => '---------------------------', 'value' => ""],

                                                    ['label' => '4. Sınıf Güz Dönemi', 'value' => "4. Sınıf Güz Dönemi"],
                                                    ['label' => '4. Sınıf Bahar Dönemi', 'value' => "4. Sınıf Bahar Dönemi"],
                                                    ['label' => '4. Sınıf Yaz Dönemi', 'value' => "4. Sınıf Yaz Dönemi"],

                                                    ['label' => '---------------------------', 'value' => ""],

                                                    ['label' => '5. Sınıf Güz Dönemi', 'value' => "5. Sınıf Güz Dönemi"],
                                                    ['label' => '5. Sınıf Bahar Dönemi', 'value' => "5. Sınıf Bahar Dönemi"],
                                                    ['label' => '5. Sınıf Yaz Dönemi', 'value' => "5. Sınıf Yaz Dönemi"],

                                                    ['label' => '---------------------------', 'value' => ""],

                                                    ['label' => '6. Sınıf Güz Dönemi', 'value' => "6. Sınıf Güz Dönemi"],
                                                    ['label' => '6. Sınıf Bahar Dönemi', 'value' => "6. Sınıf Bahar Dönemi"],
                                                    ['label' => '6. Sınıf Yaz Dönemi', 'value' => "6. Sınıf Yaz Dönemi"],


                                                ]])@endcomponent
                                            </div>
                                            <div class="col-md-4">
                                                @component('components.form.select', ['name' => 'exam_type', 'label' => 'Sınav Türü',
                                                    'required' => 'true',
                                                    'placeholder' => 'Sınav Türü Seçiniz',
                                                                    'options' => [
                                                    ['label' => 'Ara Sınav', 'value' => "Ara Sınav"],
                                                    ['label' => 'Yarıyıl Sınavı', 'value' => "Yarıyıl Sınavı"],
                                                    ['label' => 'Bütünleme Sınavı', 'value' => "Bütünleme Sınavı"],
                                                ]])@endcomponent
                                            </div>
                                            <div class="col-md-3">
                                                @component('components.form.input', ['name' => 'course_note', 'label' => 'Ders Notu'])@endcomponent
                                            </div>

                                            <div class="col-md-6">
                                                @component('components.form.select', ['name' => 'student_id', 'label' => 'Öğrenci', 'placeholder'=> 'Öğrenci Seçiniz', 'options' => $students_option])@endcomponent
                                            </div>
                                            <div class="col-md-6">
                                                @component('components.form.select', ['name' => 'course_id', 'label' => 'Ders', 'placeholder'=> 'Ders Seçiniz', 'options' => $courses_option])@endcomponent
                                            </div>
                                        </div>
                                        <div class="text-right" style="margin-top: 1rem">
                                            <a type="button" class="btn btn-success" data-bs-toggle="modal"
                                               href="#saveModal">
                                                <i class="fas fa-trash mr-2"></i>
                                                Kaydet
                                            </a>
                                            <a class="btn btn-outline-dark"
                                               href="{{ url('/student-grades/') }}">İptal</a>
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