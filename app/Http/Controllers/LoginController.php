<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    // 
    public function index()
    {
        return view('forms.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            Alert::toast('Login berhasil!', 'success');
            return redirect('/mading');
        }
        Alert::toast('Username atau password mu salah!', 'error');
        return back();
        
        
    }

    

    public function logout()
    {
        Auth::logout();

        request()->session()->invalidate();

        request()->session()->regenerateToken();

        Alert::toast('Logout berhasil!', 'success');
        return redirect('/mading');
    }
}
