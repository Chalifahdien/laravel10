<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\PekerjaanController;
use Illuminate\Support\Facades\Route;


// ----------------------LOGIN------------------------//


Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
;
Route::post('/register', [RegisterController::class, 'store']);


// ----------------------USER-------------------------//


Route::get('/', [UserController::class, 'index'])->name('beranda')->middleware('auth', 'checkrole:2');
Route::get('/profil', [UserController::class, 'profil'])->middleware('auth', 'checkrole:2');
Route::get('/ajukan', [PekerjaanController::class, 'ajukan'])->middleware('auth', 'checkrole:2');
Route::post('/ajukan', [PekerjaanController::class, 'store']);
Route::get('/ambil', [UserController::class, 'ambil'])->middleware('auth', 'checkrole:2');
Route::get('/ambil/{pekerjaan:id_pekerjaan}', [UserController::class, 'detailPekerjaan'])->middleware('auth', 'checkrole:2');
Route::put('/pekerjaan/{id_pekerjaan}/ambil', [UserController::class, 'ambilPekerjaan'])->name('pekerjaan.ambil');
Route::put('/pekerjaan/{id_pekerjaan}/selesai', [UserController::class, 'selesaiPekerjaan'])->name('pekerjaan.selesai');
Route::put('/pekerjaan/{id_pekerjaan}/ajukan', [UserController::class, 'ajukankembali'])->name('pekerjaan.ajukan');
Route::put('/pekerjaan/{id_pekerjaan}/hapus', [UserController::class, 'hapusPekerjaan'])->name('pekerjaan.hapus');
Route::post('/pekerjaan/{id_pekerjaan}/komentar', [PekerjaanController::class, 'komentarPekerjaan'])->name('pekerjaan.komentar');
Route::get('/pengguna/{pengguna:id_pengguna}', [UserController::class, 'pekerjaanUser'])->middleware('auth', 'checkrole:2');


// ----------------------Admin-------------------------//


Route::get('/admin', [AdminController::class, 'dashboard'])->name('admin')->middleware('auth', 'checkrole:1');
Route::get('/user', [AdminController::class, 'users'])->middleware('auth', 'checkrole:1');
Route::get('/request', [AdminController::class, 'request'])->name('request')->middleware('auth', 'checkrole:1');
Route::put('/pekerjaan/{id_pekerjaan}/accept', [AdminController::class, 'accept'])->name('pekerjaan.accept');
Route::put('/pekerjaan/{id_pekerjaan}/reject', [AdminController::class, 'reject'])->name('pekerjaan.reject');

Route::get('/ongoing', [AdminController::class, 'ongoing'])->middleware('auth', 'checkrole:1');
Route::get('/history', [AdminController::class, 'history'])->middleware('auth', 'checkrole:1');
Route::get('/detail/{pekerjaan:id_pekerjaan}', [AdminController::class, 'detailPekerjaan'])->middleware('auth', 'checkrole:1');
Route::get('/pekerjaan/{pengguna:id_pengguna}', [AdminController::class, 'pekerjaanUser'])->middleware('auth', 'checkrole:1');
