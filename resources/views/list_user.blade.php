@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-10">

            {{-- Card List User --}}
            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header text-white rounded-top-4"
                     style="background: linear-gradient(90deg, #007bff, #00c6ff);">
                    <h4 class="mb-0 fw-bold">
                        <i class="bi bi-people-fill me-2"></i> Daftar Pengguna
                    </h4>
                </div>

                <div class="card-body p-4">
                    {{-- Tabel Daftar User --}}
                    <div class="table-responsive">
                        <table class="table table-hover table-striped align-middle">
                            <thead class="table-primary">
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">NIM</th>
                                    <th scope="col">Kelas</th>
                                    <th scope="col" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($users as $user)
                                    <tr>
                                        <td>{{ $user->id }}</td>
                                        <td>{{ $user->nama }}</td>
                                        <td>{{ $user->nim }}</td>
                                        <td>{{ $user->nama_kelas }}</td>
                                        <td class="text-center">
                                            <a href="{{ url('/user/edit/'.$user->id) }}" 
                                               class="btn btn-sm btn-outline-warning me-2">
                                                <i class="bi bi-pencil-square"></i> Edit
                                            </a>
                                            <form action="{{ url('/user/delete/'.$user->id) }}" 
                                                  method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">
                                            <i class="bi bi-info-circle"></i> Belum ada data pengguna
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    {{-- Tombol Tambah User --}}
                    <div class="mt-3 text-end">
                        <a href="{{ url('/user/create') }}" 
                           class="btn text-white px-4" 
                           style="background: linear-gradient(90deg, #007bff, #00c6ff); border:none;">
                            <i class="bi bi-person-plus"></i> Tambah User
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