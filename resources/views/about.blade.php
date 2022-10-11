@extends('layouts.master')

@push('title', 'About')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu /</span> About
    </h4>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="row g-0">
                    <div class="col-md-4">
                        <img class="card-img card-img-left" src="{{ asset('assets') }}/img/photo_profil.png" alt="Card image">
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Aplikasi ini dibuat oleh:</h5>
                            <table>
                                <tr>
                                    <td>Nama</td>
                                    <td>: Nur Rohman</td>
                                </tr>
                                <tr>
                                    <td>NIM</td>
                                    <td>: 1931730144</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>: 11 Oktober 2022</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection