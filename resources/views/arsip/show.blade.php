@extends('layouts.master')

@push('title', 'Arsip')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu / Arsip Surat /</span> Lihat
    </h4>
    <table>
        <tr>
            <td>Nomor </td>
            <td> : {{ $arsip->no_surat }}</td>
        </tr>
        <tr>
            <td>Kategori </td>
            <td class="text-capitalize"> : {{ $arsip->kategori }}</td>
        </tr>
        <tr>
            <td>Judul </td>
            <td> : {{ $arsip->judul }}</td>
        </tr>
        <tr>
            <td>Waktu Unggah </td>
            <td> : {{ date('H:i d F Y', strtotime($arsip->created_at)) }}</td>
        </tr>
    </table>
    <div class="card mt-3">
        <div class="card-body">
            <iframe src="{{ asset('/storage/'. $arsip->surat) }}" width="100%" height="400px"></iframe>
            <div class="mt-3">
                <a href="{{ route('arsip.index') }}" class="btn btn-info btn-sm text-white me-2">
                    « Kembali
                </a>
                <a href="{{ route('arsip.download', $arsip->id) }}" class="btn btn-success btn-sm text-white me-1">
                    Unduh
                </a>
                <a href="{{ route('arsip.edit', $arsip->id) }}" class="btn btn-warning btn-sm text-white">
                    Edit/Ganti File
                </a>
            </div>
        </div>
    </div>
</div>
@endsection