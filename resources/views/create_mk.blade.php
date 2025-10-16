@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Card Create Mata Kuliah --}}
            <div class="card shadow-lg border-0 rounded-4" style="background: #ffffffd9; backdrop-filter: blur(10px);">
                <div class="card-header text-center text-white rounded-top-4" 
                     style="background: linear-gradient(90deg, #007bff, #00c6ff);">
                    <h4 class="mb-0 fw-bold"><i class="bi bi-book-half me-2"></i> Tambah Mata Kuliah</h4>
                </div>

                <div class="card-body p-4">

                    {{-- Form Tambah Mata Kuliah --}}
                    <form action="{{ route('matakuliah.store') }}" method="POST">
                        @csrf

                        {{-- Input Nama Mata Kuliah --}}
                        <div class="mb-3">
                            <label for="nama_mk" class="form-label fw-semibold">Nama Mata Kuliah</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-book"></i></span>
                                <input type="text" id="nama_mk" name="nama_mk" 
                                       class="form-control" placeholder="Masukkan nama mata kuliah" required>
                            </div>
                        </div>

                        {{-- Input SKS --}}
                        <div class="mb-3">
                            <label for="sks" class="form-label fw-semibold">Jumlah SKS</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                <input type="number" id="sks" name="sks" 
                                       class="form-control" placeholder="Masukkan jumlah SKS" required min="1" max="6">
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ url('/matakuliah') }}" class="btn btn-outline-secondary px-4 me-2">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" class="btn text-white px-4" 
                                    style="background: linear-gradient(90deg, #007bff, #00c6ff); border:none;">
                                <i class="bi bi-save"></i> Simpan
                            </button>
                        </div>
                    </form>

                </div>
            </div>
            {{-- End Card --}}

        </div>
    </div>
</div>

{{-- Bootstrap Icons CDN --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection