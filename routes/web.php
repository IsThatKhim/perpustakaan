<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\CategoriController; // Changed from KategoriController to CategoriController
use App\Http\Controllers\UserController;
use App\Http\Controllers\PeminjamanController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

 
});

Route::middleware(['Role:admin,petugas'])->group(function () {
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/store', [UserController::class, 'store'])->name('user.store');
    Route::post('/register', [UserController::class, 'create'])->name('register');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/update/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    Route::get('/buku', [BookController::class, 'index'])->name('buku.index');
    Route::get('/buku/create', [BookController::class, 'create'])->name('buku.create');
    Route::post('/buku/store', [BookController::class, 'store'])->name('buku.store');
    Route::get('/buku/edit/{id}', [BookController::class, 'edit'])->name('buku.edit');
    Route::put('/buku/update/{id}', [BookController::class, 'update'])->name('buku.update');
    Route::delete('/buku/{id}', [BookController::class, 'destroy'])->name('buku.destroy');

    Route::get('/kategori', [CategoriController::class, 'index'])->name('kategori.index'); // Changed from KategoriController to CategoriController
    Route::get('/kategori/create', [CategoriController::class, 'create'])->name('kategori.create'); // Changed from KategoriController to CategoriController
    Route::post('/kategori/store', [CategoriController::class, 'store'])->name('kategori.store'); // Changed from KategoriController to CategoriController
    Route::get('/kategori/edit/{id}', [CategoriController::class, 'edit'])->name('kategori.edit'); // Changed from KategoriController to CategoriController
    Route::put('/kategori/update/{id}', [CategoriController::class, 'update'])->name('kategori.update'); // Changed from KategoriController to CategoriController
    Route::delete('/kategori/{id}', [CategoriController::class, 'destroy'])->name('kategori.destroy'); // Changed from KategoriController to CategoriController

    Route::get('/peminjaman', [PeminjamanController::class, 'index'])->name('peminjaman.index');
    Route::get('/peminjaman/create', [PeminjamanController::class, 'create'])->name('peminjaman.create');
    Route::post('/peminjaman/store', [PeminjamanController::class, 'store'])->name('peminjaman.store');
    Route::get('/peminjaman/edit/{id}', [PeminjamanController::class, 'edit'])->name('peminjaman.edit');
    Route::put('/peminjaman/update/{id}', [PeminjamanController::class, 'update'])->name('peminjaman.update');
    Route::delete('/peminjaman/{id}', [PeminjamanController::class, 'destroy'])->name('peminjaman.destroy');

    
});

require __DIR__.'/auth.php';
