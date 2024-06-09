<?php

namespace App\Http\Controllers;

use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function profile()
    {
        return view('profile');
    }

    public function index()
    {

        $users = User::orderBy('created_at', 'desc')->get();
        return view('admin.tables.users', ['users' => $users]);
    }

    public function edit($id)
    {
        $user = user::find($id);
        return view('forms.edit.user', ['user' => $user]);


    }

    public function edited(Request $request, $id)
    {
        $validatedData = $request->validate([
            'role' => 'required',
        ]);

        $user = user::find($id);
        $user->role = $validatedData['role'];
        $user->save();

        Alert::success('Data diedit', 'data berhasil diedit');
        return redirect('/admin/user');
    }

    public function hapus($id)
    {
        user::find($id)->delete();

        Alert::success('Data dihapus', 'data berhasil dihapus');
        return view('admin.tables.users');

    }

    public function pengaju()
    {
        $users = User::where('pengajuan_penulis', "=", true)->get();
        return view('admin.tables.user-pembuat', ['users' => $users]);
    }

    public function cari_pengaju(Request $request)
    {
        $key = $request->cari;
        $users = DB::table('vPengajuPenulis')->where('nama', 'like', "%" . $key . "%")->orWhere('username', 'like', "%" . $key . "%")->get();
        return view('admin.tables.user-pembuat', ['users' => $users]);
    }

    public function aproved($id)
    {
        $user = User::find($id);
        $user->pengajuan_penulis = false;
        $user->role = "pembuat";
        $user->save();
        Alert::success('user: ' . $user->nama . ' diedit', 'User menjadi pembuat');
        return redirect('/admin/user/pengaju-pembuat');
    }

    public function denied($id)
    {
        $user = User::find($id);
        $user->pengajuan_penulis = false;
        $user->save();
        Alert::success('user: ' . $user->nama . ' diedit', 'permintaan user ditolak');
        return redirect('/admin/user/pengaju-pembuat');
        
    }
}
