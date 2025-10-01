@extends('layouts.app')

@section('content')

    <h1>Sofia Azahra</h1>

    {{-- Kode Formulir untuk Menambahkan Pengguna --}}
    <form action="{{ route('user.store') }}" method="POST">
        @csrf

        {{-- Input Nama --}}
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama"><br><br>

        {{-- Input NPM (Nomor Pokok Mahasiswa) --}}
        <label for="nim">NPM:</label><br>
        <input type="text" id="nim" name="nim"><br><br>

        {{-- Pilihan Kelas --}}
        <label for="kelas">Kelas:</label><br>
        <select name="kelas_id" id="kelas_id">
            @foreach ($kelas as $kelasItem)
                <option value="{{ $kelasItem->id }}">{{ $kelasItem->nama_kelas }}</option>
            @endforeach
        </select><br><br>

        {{-- Tombol Submit --}}
        <button type="submit">Submit</button>
    </form>

@endsection