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
            'users' => $this->userModel->getUser(), // Panggilan ke fungsi getUser()
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

    // Memproses data formulir dan menyimpannya ke database
    public function store(Request $request)
    {
        $this->userModel->create([
            'nama' => $request->input('nama'),
            'nim' => $request->input('nim'), 
            'kelas_id' => $request->input('kelas_id'),
        ]);

        return redirect()->to('/user'); 
    }

    // Menampilkan daftar pengguna (memanggil getUser() dari Model)
    
}