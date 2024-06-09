<?php

use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MadingController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


Route::get('/', function () {
    return view('home');
});
Route::get('/tes', function () {
    $mading = DB::table('vmading');
    return view('pdf.mading', ["mading" => $mading]);
});

//mading route
Route::get('/home', [MadingController::class, 'home']);
Route::get('/mading', [MadingController::class, 'index']);
Route::get('/mading/filtering', [MadingController::class, 'filtering']);
Route::get('/search', [MadingController::class, 'cari'])->name('search');
Route::get('/mading/create', [MadingController::class, 'tambah'])->middleware('auth');
Route::post('/mading/create/store', [MadingController::class, 'store'])->middleware('auth');
Route::get('/mading/detail/{mading:slug}',[MadingController::class, 'detail']);
Route::delete('/mading/hapus/{id}',[MadingController::class,'hapus'])->middleware('is_admin');
Route::get('/mading/edit/{id}',[MadingController::class,'edit'])->middleware('is_admin');
Route::post('/mading/update/{id}',[MadingController::class,'edited'])->middleware('is_admin');
Route::get('/mading/mymading',[MadingController::class, 'mymading'])->middleware('auth');


// kategori route
Route::get('/admin/kategori', [KategoriController::class,'index'])->middleware('is_admin');
Route::get('/admin/kategori/tambah', [KategoriController::class,'tambah'])->middleware('is_admin');
Route::get('/admin/kategori/cari', [KategoriController::class,'cari'])->middleware('is_admin');
Route::post('/admin/kategori/tambah/store', [KategoriController::class,'store'])->middleware('is_admin');
Route::delete('/admin/kategori/hapus/{id_kategori}', [KategoriController::class, 'hapus'])->middleware('is_admin');
Route::get('/admin/kategori/edit/{id_kategori}', [KategoriController::class,'edit'])->middleware('is_admin');
Route::put('/admin/kategori/edited/{id_kategori}', [KategoriController::class,'edited'])->middleware('is_admin');

// admin route
Route::get('/admin/mading',[MadingController::class,'tampilAdmin'])->name('admin.mading')->middleware('is_admin');

Route::get('/Register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/Register/store',[RegisterController::class, 'store'])->middleware('guest');

Route::get('/Login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/Login/auth',[LoginController::class, 'authenticate']);
Route::get('logout',[LoginController::class,'logout'])->middleware('auth');
Route::get('/profile', [UserController::class,'profile'])->middleware('auth');

Route::get('/pdf',[MadingController::class, 'viewPdf'])->middleware('is_admin');

// Users route
Route::get('/admin/user',[UserController::class, 'index'])->middleware('is_admin');
Route::get('/admin/user/pengaju-pembuat/cari',[UserController::class, 'cari_pengaju'])->middleware('is_admin');
Route::get('/admin/user/edit/{id}',[UserController::class, 'edit'])->middleware('is_admin');
Route::post('/admin/user/edited/{id}', [UserController::class, 'edited'])->middleware('is_admin');
Route::delete('/admin/user/hapus/{id}', [UserController::class,'hapus'])->middleware('is_admin');
Route::get('/admin/user/pengaju-pembuat',[UserController::class,'pengaju'])->middleware('is_admin');
Route::put('/user/aproved/{id}',[UserController::class,'aproved'])->middleware('is_admin');
Route::put('/user/denied/{id}',[UserController::class,'denied'])->middleware('is_admin');

