@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- Card List Mata Kuliah --}}
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white rounded-top-4"
                     style="background: linear-gradient(90deg, #007bff, #00c6ff);">
                    <h4 class="mb-0 fw-bold">
                        <i class="bi bi-journal-bookmark-fill me-2"></i> Daftar Mata Kuliah
                    </h4>
                </div>

                <div class="card-body p-4">
                    {{-- Tabel Daftar Mata Kuliah --}}
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Mata Kuliah</th>
                                    <th scope="col">SKS</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mks as $mk)
                                    <tr>
                                        <td>{{ $mk->id }}</td>
                                        <td>{{ $mk->nama_mk }}</td>
                                        <td>{{ $mk->sks }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/matakuliah/'.$mk->id.'/edit') }}" 
                                               class="btn btn-sm btn-outline-warning me-2">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>

                                            <form action="{{ url('/matakuliah/'.$mk->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Yakin ingin menghapus mata kuliah ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted">
                                            <i class="bi bi-info-circle"></i> Belum ada data mata kuliah
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Tombol Tambah Mata Kuliah --}}
                    <div class="mt-3 text-end">
                        <a href="{{ url('/matakuliah/create') }}" 
                           class="btn text-white px-4" 
                           style="background: linear-gradient(90deg, #007bff, #00c6ff); border:none;">
                            <i class="bi bi-plus-lg"></i> Tambah Mata Kuliah
                        </a>
                    </div>
                </div>
            </div>
            {{-- End Card --}}

        </div>
    </div>
</div>

{{-- Bootstrap Icons --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
@endsection