@extends('layouts.master')

@push('title', 'Arsip')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu /</span> Arsip Surat
    </h4>
    <p>Berikut ini adalah surat-surat yang telah terbit dan diarsipkan. <br>Klik <strong class="text-primary p-cursor">Lihat »</strong> pada kolom aksi untuk manampilkan surat.</p>
    <div class="card">
        @if(\Session::has('success'))
        <div class="alert alert-primary alert-dismissible" role="alert">
            <strong>Peringatan!</strong> {{\Session::get('success')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif
        <div class="row m-3">
            <label class="col-sm-2 col-form-label" for="basic-icon-default-fullname">Cari Surat</label>
            <div class="col-sm-10">
                <form action="/arsip">
                    <div class="input-group input-group-merge">
                        <input type="search" name="search" class="form-control" id="keyword" placeholder="Cari judul" value="{{ request('search') }}" autocomplete="off">
                        <span class="input-group-text bx bx-search-alt"></span>
                        <button class="btn btn-primary" type="submit">Search</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="table-responsive text-nowrap">
            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th class="text-white">Nomer Surat</th>
                        <th class="text-white">Kategori</th>
                        <th class="text-white">Judul</th>
                        <th class="text-white">Waktu Pengarsipan</th>
                        <th class="text-white"><i class='tf-icons bx bxs-cog'></i></th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @forelse($arsip as $data)
                    <tr>
                        <th>
                            <span class="badge bg-primary">{{ $data->no_surat }}</span>
                        </th>
                        <td class="text-capitalize">{{ $data->kategori }}</td>
                        <td>{{ $data->judul }}</td>
                        <td>{{ date('H:i d F Y', strtotime($data->created_at)) }}</td>
                        <td>
                            <form action="{{ route('arsip.destroy', $data->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah anda yakin ingin mengahapus arsip ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" id="delete" class="btn btn-danger btn-sm text-white me-1">Hapus</button>
                            </form>
                            <a href="{{ route('arsip.download', $data->id) }}" class="btn btn-success btn-sm text-white me-1">Unduh</a>
                            <a href="{{ route('arsip.show', $data->id) }}" class="btn btn-info btn-sm text-white">Lihat »</a>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">Tidak ada data yang tersedia</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="card-body">
            <a href="{{ route('arsip.create') }}" class="btn btn-primary text-white">
                Arsipkan Surat »
            </a>
        </div>
    </div>
</div>
@endsection