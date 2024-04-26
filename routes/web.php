<?php

use App\Http\Controllers\BukuController;
use App\Http\Controllers\kategoriController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

//guest (belum login)
Route::get('/', [BukuController::class, 'welcome'])->name('welcom');
Route::get('/detail/{id}', [BukuController::class, 'detail'])->name('detail');

//semua level user yang belum login
  
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


//admin
Route::middleware(['auth', 'role:user'])->group (function () {
Route::get('/user', [UserController::class, 'index'])->name('users.index');
Route::get('/user/tambah', [UserController::class, 'create'])->name('users.create');
Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
Route::delete('/user/delete(id)', [UserController::class, 'delete'])->name('users.delete');
});


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//admin dan petugas
Route::middleware(['auth','role:petugas|admin'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori');
    Route::get('/kategori/tambah', [KategoriController::class,'create'])->name('kategori.create');
    Route::post('/kategori/store', [KategoriController::class,'store'])->name('kategori.store');
    Route::delete('/kategori/hapus/{id}', [KategoriController::class, 'hapus'])->name('kategori.hapus');
    Route::get('/kategori/edit/{id}', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::patch('/kategori/update/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');
    Route::get('/buku/tambah', [BukuController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::delete('/buku/delete/{id}', [BukuController::class, 'delete'])->name('buku.delete');
    Route::get('/buku/edit/{id}', [BukuController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/update/{id}', [BukuController::class, 'update'])->name('buku.update'); 
    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/tambah', [PeminjamanController::class, 'tambahPeminjaman'])->name('peminjaman.tambah');
    Route::post('/peminjaman/store', [PeminjamanController::class, 'storePeminjaman'])->name('peminjaman.store');
    Route::post('/peminjaman/selesai/{id}', [PeminjamanController::class, 'kembalikanBuku'])->name('peminjaman.kembalikan');
    Route::get('/peminjaman/denda/{id}', [PeminjamanController::class, 'bayarDenda'])->name('peminjaman.denda');

 
    Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/report', [PeminjamanController::class, 'print'])->name('print');
    Route::get('/user', [UserController::class, 'index'])->name('users.index');
    Route::get('/user/tambah', [UserController::class, 'create'])->name('users.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('users.store');
    Route::delete('/user/hapus/{id}', [UserController::class, 'delete'])->name('users.delete');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('users.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('users.update'); 
});

//user
Route::middleware(['auth', 'role:user'])->group (function () {
    Route::get('/user/peminjaman', [PeminjamanController::class, 'userPeminjaman'])->name('peminjaman.user');
   
    
});
require __DIR__.'/auth.php';