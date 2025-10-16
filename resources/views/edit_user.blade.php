@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">

            {{-- Card Edit User --}}
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white rounded-top-4"
                     style="background: linear-gradient(90deg, #007bff, #00c6ff);">
                    <h4 class="mb-0 fw-bold">
                        <i class="bi bi-pencil-square me-2"></i> Edit Data Pengguna
                    </h4>
                </div>

                <div class="card-body p-4">
                    <form action="{{ url('/user/update/'.$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        {{-- Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label fw-semibold">Nama</label>
                            <input type="text" name="nama" id="nama"
                                   class="form-control rounded-3 shadow-sm"
                                   value="{{ old('nama', $user->nama) }}" required>
                        </div>

                        {{-- NIM --}}
                        <div class="mb-3">
                            <label for="nim" class="form-label fw-semibold">NIM</label>
                            <input type="text" name="nim" id="nim"
                                   class="form-control rounded-3 shadow-sm"
                                   value="{{ old('nim', $user->nim) }}" required>
                        </div>

                        {{-- Kelas --}}
                        <div class="mb-4">
                            <label for="kelas_id" class="form-label fw-semibold">Kelas</label>
                            <select name="kelas_id" id="kelas_id"
                                    class="form-select rounded-3 shadow-sm" required>
                                <option value="">-- Pilih Kelas --</option>
                                @foreach ($kelas as $k)
                                    <option value="{{ $k->id }}" 
                                        {{ $user->kelas_id == $k->id ? 'selected' : '' }}>
                                        {{ $k->nama_kelas }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Tombol --}}
                        <div class="d-flex justify-content-between">
                            <a href="{{ url('/user') }}" class="btn btn-outline-secondary px-4">
                                <i class="bi bi-arrow-left"></i> Kembali
                            </a>
                            <button type="submit" 
                                    class="btn text-white px-4"
                                    style="background: linear-gradient(90deg, #007bff, #00c6ff); border:none;">
                                <i class="bi bi-save"></i> Simpan Perubahan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            {{-- End Card --}}

        </div>
    </div>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection