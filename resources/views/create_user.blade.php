@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Card Create User --}}
            <div class="card shadow-lg border-0 rounded-4" style="background: #ffffffd9; backdrop-filter: blur(10px);">
                <div class="card-header text-center text-white rounded-top-4" 
                     style="background: linear-gradient(90deg, #007bff, #00c6ff);">
                    <h4 class="mb-0 fw-bold"><i class="bi bi-person-plus-fill me-2"></i> Tambah User</h4>
                </div>

                <div class="card-body p-4">

                    {{-- Form Tambah User --}}
                    <form action="{{ route('user.store') }}" method="POST">
                        @csrf

                        {{-- Input Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama Lengkap</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" id="nama" name="nama" 
                                       class="form-control" placeholder="Masukkan nama lengkap" required>
                            </div>
                        </div>

                        {{-- Input NIM --}}
                        <div class="mb-3">
                            <label for="nim" class="form-label fw-semibold">NIM</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-card-list"></i></span>
                                <input type="text" id="nim" name="nim" 
                                       class="form-control" placeholder="Masukkan NIM" required>
                            </div>
                        </div>

                        {{-- Pilih Kelas --}}
                        <div class="mb-3">
                            <label for="kelas_id" class="form-label fw-semibold">Kelas</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-people"></i></span>
                                <select name="kelas_id" id="kelas_id" class="form-select" required>
                                    <option value="" selected disabled>-- Pilih Kelas --</option>
                                    @foreach ($kelas as $kelasItem)
                                        <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-end mt-4">
                            <a href="{{ url('/user') }}" class="btn btn-outline-secondary px-4 me-2">
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