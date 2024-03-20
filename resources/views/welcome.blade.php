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
                                <th scope="col"></th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td scope="row">sdadasadd</td>
                                <td scope="row">sdadasadd</td>
                                <td scope="row">sdadasadd</td>
                                <td scope="row">sdadasadd</td>
                                <td scope="row">sdadasadd</td>
                                <td scope="row">sdadasadd</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
