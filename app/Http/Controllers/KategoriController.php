<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\kategori;
use Illuminate\Support\Facades\Redirect;
use RealRashid\SweetAlert\Facades\Alert;

class KategoriController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        $kategori = Kategori::all();
        return view('admin.tables.kategori',["kategori" => $kategori]);
    }

    public function tambah()
    {
        $this->authorize('admin');
        return view('forms.kategori');
    }

    public function store(Request $request)
    { 
        $this->authorize('admin');  
        $this->validate($request,[
            'id_kategori' => 'required|numeric',
            'kategori' => 'required|max:15',
        ]);

        kategori::create([
            'id_kategori' => $request->id_kategori,
            'kategori' => $request->kategori,
        ]);
        Alert::success('Data ditambahkan', 'data berhasil ditambahkan');
        return Redirect('/admin/kategori');
    }

    public function edit($id_kategori)
    {
        $this->authorize('admin');
        $kategori = kategori::find($id_kategori);
        return view('forms.edit.kategori', ["kategori" => $kategori]);
    }

    public function edited($id_kategori, Request $request)
    {
        $this->authorize('admin');
        $kategori = kategori::find($id_kategori);
        $kategori->id_kategori = $request->id_kategori;
        $kategori->kategori = $request->kategori;
        $kategori->save();
        Alert::success('Data diedit', 'data berhasil diedit!');
        return Redirect('/admin/kategori');
    }

    public function hapus($id_kategori)
    { 
        $this->authorize('admin');
        kategori::find($id_kategori)->delete();
        Alert::success('Data dihapus', 'data berhasil dihapus');
        return Redirect('/admin/kategori');
    }

    public function cari(Request $request){
        $key = $request->cari;
        $kategori = Kategori::where('id_kategori','like',"%".$key."%")->orWhere('kategori','like',"%".$key."%")->get();
        return view('admin.tables.kategori',['kategori' => $kategori]);
    }
}
