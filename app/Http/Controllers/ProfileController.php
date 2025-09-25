<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function profile($Nama = "", $Npm = "", $Kelas = ""){
        $data = [
            'Nama'=> $Nama, 
            'Npm'=> $Npm, 
            'Kelas'=> $Kelas
        ];
        return view('profile', $data);
    }
}
