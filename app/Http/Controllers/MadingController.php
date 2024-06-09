<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use Illuminate\Http\Request;
use App\Models\mading;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use \Cviebrock\EloquentSluggable\Services\SlugService;
use Carbon\Carbon as Carbon;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;
use Barryvdh\DomPDF\Facade\Pdf;

class MadingController extends Controller
{
    //mading
    public function home()
    {
        return view('home');
    }
    public function index()
    {
        $mading = DB::table('vmading')->get();
        $kategori = kategori::all();


        return view('mading', ['mading' => $mading, 'kategori' => $kategori]);
    }

    public function tampilAdmin()
    {
        $this->authorize('admin');
        $mading = DB::table('vmading')->get();
        return view('admin.tables.mading', ['mading' => $mading]);
        
    }

    public function cari(Request $request)
    {

        if ($request->ajax()) {
            $output = "";
            $data = DB::table('vmading')->where('judul', 'Like', '%' . $request->search . '%')->orWhere('created_at', 'like', '%' . $request->search . '%')->get();

            if ($data) {
                foreach ($data as $informasi) {
                    $output .= '
                    <div class="max-w-sm h-[355px] md:h-fit bg-white border border-gray-200 rounded-lg shadow ">
                            <a href="">
                                <img class="rounded-t-lg h-[170px] md:h-[270px] w-[350px] object-cover"
                                    src="' . asset('img/' . $informasi->gambar) . '" alt="" />
                            </a>
                            <div class="p-5">

                                <a href="">
                                    <h5 class="mb-2 text-xl font-bold tracking-tight text-gray-900 ">' . $informasi->judul . '
                                    </h5>
                                </a>
                                <div class="flex flex-wrap gap-2 md:justify-between">
                                    <p class="my-auto text-xs font-light text-slate-400"
                                        style="font-family: "Redit-sans", sans-serif;">
                                        ' . Carbon::parse($informasi->created_at)->format("d-M-Y") . '</p>
                                    <p
                                        class="inline-block bg-sky-200 shadow-md text-xs font-normal py-1 px-3 rounded-lg mb-[6px] text-slate-700 ">
                                        ' . $informasi->kategori . '</p>
                                </div>
                                <a href="/mading/detail/' . $informasi->slug . '"
                                    class="inline-flex items-center px-3 py-2 text-xs font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 hover:shadow-lg hover:shadow-blue-200 focus:ring-4 focus:outline-none focus:ring-blue-300 mt-3">
                                    Baca selengkapnya
                                    <svg class="rtl:rotate-180 w-3.5 h-3.5 ms-2" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 10">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="M1 5h12m0 0L9 1m4 4L9 9" />
                                    </svg>
                                </a>
                            </div>
                        </div>
                    ';

                }
                return Response($output);
            }

        }


    }

    public function tambah()
    {
        $this->authorize('create-mading');
        $kategori = kategori::all();
        return view('create-mading', ["kategori" => $kategori]);
    }

    public function store(Request $request)
    {
        $this->authorize('create-mading');
        $this->validate($request, [
            'judul' => 'required|max:40',
            'gambar' => 'required|mimes:png,jpg,jpeg|max:2048',
            'kategori_id' => 'required',
            'konten' => 'required',
            'pembuat' => 'max:40'
        ]);

        $file = $request->file('gambar');
        $nama_file = time() . "_" . $file->getClientOriginalName();
        $tempat = 'img';
        $file->move($tempat, $nama_file);

        mading::create([
            'judul' => $request->judul,
            'gambar' => $nama_file,
            'kategori_id' => $request->kategori_id,
            'konten' => $request->konten,
            'pembuat' => auth()->user()->nama
        ]);

        Alert::success('Data ditambahkan', 'data berhasil ditambahkan');
        return Redirect()->back();

    }

    public function detail(Mading $mading)
    {

        return view('detail', ['mading' => $mading]);
    }

    public function edit($id)
    {
        $this->authorize('admin');
        $kategori = Kategori::all();
        $mading = Mading::find($id);
        $vmading = DB::table('vmading')->where('id', '=', $id)->get();
        return view('forms.edit.mading', ['mading' => $mading, 'kategori' => $kategori, 'vmading' => $vmading]);
    }

    public function edited($id, Request $request)
    {
        $this->authorize('admin');
        $this->validate($request, [
            'judul' => 'required|max:40',
            'gambar' => 'mimes:png,jpg,jpeg|max:2048',
            'kategori_id' => 'required',
            'konten' => 'required',
        ]);


        $mading = Mading::find($id);

        if ($request->judul) {
            $mading->judul = $request->judul;
        }

        if ($request->gambar) {
            $gambarLama = $mading->gambar;
            File::delete('img/' . $gambarLama);
            $file = $request->file('gambar');
            $nama_file = time() . "_" . $file->getClientOriginalName();
            $tempat = 'img';
            $file->move($tempat, $nama_file);
            $mading->gambar = $nama_file;

        }
        $mading->kategori_id = $request->kategori_id;
        $mading->konten = $request->konten;
        $mading->save();

        Alert::success('Data diedit', 'data berhasil diedit');
        return redirect('/admin/mading');
    }

    public function hapus($id)
    {
        $this->authorize('admin');
        $mading = Mading::find($id);
        File::delete('img/' . $mading->gambar);
        $mading->delete();

        Alert::success('Data dihapus', 'data berhasil dihapus');
        return redirect('/admin/mading');
    }

    public function filtering(Request $request)
    {
        $mading = DB::table('vmading')->where('id_kategori', '=', $request->filter)->get();
        $kategori = kategori::all();

        return view('mading', ['mading' => $mading, 'kategori' => $kategori]);
    }

    public function mymading()
    {
        $this->authorize('my-mading');
        $mading = DB::table('vmading')->where('pembuat', '=', auth()->user()->nama)->get();
        return view('myMading.mading', ["mading" => $mading]);
    }

    public function viewPdf()
    {
        $mading = DB::table('vmading')->get();
        //    return view('pdf.mading',["mading" => $mading]);
        $pdf = Pdf::loadView('pdf.mading', ["mading" => $mading]);
        return $pdf->stream('mading_nepal.pdf');
    }

    
}
