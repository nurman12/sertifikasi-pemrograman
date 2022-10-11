@extends('layouts.master')

@push('title', 'Arsip')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4">
        <span class="text-muted fw-light">Menu / Arsip Surat /</span> Unggah
    </h4>
    <p>Unggah surat yeng telah terbit pada form ini untuk diarsipkan. <br>
        <strong>Catatan</strong>:
        <ul>
            <li>Gunakan file format PDF</li>
        </ul>
    </p>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('arsip.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="noSurat">Nomer Surat</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="noSurat" name="no_surat" placeholder="2022/PD3/TU/001" value="{{ old('no_surat') }}">
                        @error('no_surat')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="kategori">Kategori</label>
                    <div class="col-sm-10">
                        <select name="kategori" class="form-select" id="kategori">
                            <option selected disabled>Pilih</option>
                            <option value="undangan" {{ old('kategori') == 'undangan' ? 'selected' : null }}>Undangan</option>
                            <option value="pengumuman" {{ old('kategori') == 'pengumuman' ? 'selected' : null }}>Pengumuman</option>
                            <option value="nota dinas" {{ old('kategori') == 'nota dinas' ? 'selected' : null }}>Nota Dinas</option>
                            <option value="pemberitahuan" {{ old('kategori') == 'pemberitahuan' ? 'selected' : null }}>Pemberitahuan</option>
                        </select>
                        @error('kategori')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="judul">Judul</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="{{ old('no_surat') }}">
                        @error('judul')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-2 col-form-label" for="surat">File Surat (PDF)</label>
                    <div class="col-sm-10">
                        <input type="file" class="form-control" id="surat" name="surat" placeholder="Surat" onchange="previewImage(this)" accept="application/pdf,application/vnd.ms-excel">
                        @error('surat')
                        <div class="form-text text-danger">{{ $message }}</div>
                        @enderror
                        <iframe src="" id="preview_surat" width="100%" height="0"></iframe>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-sm-10">
                        <a href="{{ route('arsip.index') }}" class="btn btn-info text-white me-3">
                            « Kembali
                        </a>
                        <button type="submit" class="btn btn-primary text-white">
                            <span class="tf-icons bx bx-detail"></span>&nbsp; Simpan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('pageJs')
<script>
    function previewImage(input) {
        let file = $("input[type=file]").get(0).files[0];
        if (file) {
            let reader = new FileReader();
            reader.onload = function() {
                $('#preview_surat').attr("src", reader.result);
            }
            document.getElementById("preview_surat").style.height = "500px";
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush