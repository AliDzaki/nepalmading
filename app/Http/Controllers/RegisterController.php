<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class RegisterController extends Controller
{
    public function index()
    {
        return view('forms.daftar');
    }
    
    public function store(Request $request)
    {
        $isChecked = $request->has('pengajuan_penulis')  ? true : false;
        $valdatedData = $request->validate([
            "nama" => "required|max:335",
            'username' => 'required|unique:user|min:4|max:40',
            'password' => 'required',
            'pengajuan_penulis' => 'nullable'
        ]);
        
        $valdatedData['password'] = Hash::make($valdatedData['password']);
        $valdatedData['pengajuan_penulis'] = $isChecked;
        User::create($valdatedData);

        Alert::toast('Pendaftaran akunmu berhasil! silahkan login.', 'success');

        return Redirect('/Login');

    }


}
