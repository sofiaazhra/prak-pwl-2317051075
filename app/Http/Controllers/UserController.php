<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kelas;
use App\Models\UserModel;

class UserController extends Controller
{
    public $userModel;
    public $kelasModel;

    public function __construct(){
        $this->userModel = new UserModel();
        $this->kelasModel = new Kelas();
    }

    public function index(){
        $data = [
            'title' => 'List User',
            'users' => $this->userModel->getUser(),
        ];
        return view('list_user', $data);
    }
    
    // Menampilkan formulir penambahan pengguna
    public function create(){
        $kelasModel = new Kelas(); 
        $kelas = $kelasModel->getKelas(); 
        
        $data = [
            'title' => 'Create User',
            'kelas' => $kelas
        ];

        return view('create_user', $data);
    }

    // Menyimpan data user baru
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50|unique:user,nim',
            'kelas_id' => 'required|uuid',
        ]);

        // gunakan Eloquent create()
        $this->userModel->create([
            'nama' => $request->nama,
            'nim' => $request->nim, 
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->to('/user')->with('success', 'Data user berhasil ditambahkan!');
    }

    // Tampilkan form edit user
    public function edit($id)
    {
        // Ambil data user menggunakan UUID
        $user = $this->userModel->findOrFail($id);
        $kelas = $this->kelasModel->getKelas();

        return view('edit_user', [
            'title' => 'Edit User',
            'user' => $user,
            'kelas' => $kelas,
        ]);
    }

    // Proses update user
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'nim' => 'required|string|max:50',
            'kelas_id' => 'required|uuid',
        ]);

        // Gunakan Eloquent untuk update
        $user = $this->userModel->findOrFail($id);
        $user->update([
            'nama' => $request->nama,
            'nim' => $request->nim,
            'kelas_id' => $request->kelas_id,
        ]);

        return redirect()->to('/user')->with('success', 'Data user berhasil diperbarui!');
    }

    // Hapus user
    public function destroy($id)
    {
        // Gunakan Eloquent delete()
        $user = $this->userModel->findOrFail($id);
        $user->delete();

        return redirect()->to('/user')->with('success', 'Data user berhasil dihapus!');
    }

}