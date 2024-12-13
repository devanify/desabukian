<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\GaleriController;
use App\Http\Controllers\InfografisController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\PengurusDesaController;
use App\Http\Controllers\UserController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/galeri', [PageController::class, 'gallery'])->name('gallery');
Route::get('/sejarah', [PageController::class, 'sejarah'])->name('sejarah');
Route::get('/artikel', [PageController::class, 'artikel'])->name('artikel');
Route::get('/artikel/{slug}', [PageController::class, 'article'])->name('article');
Route::get('/pengumuman', [PageController::class, 'pengumuman'])->name('pengumuman');
Route::get('/pengumuman/{slug}', [PageController::class, 'pengumumanview'])->name('pengumumanview');
Route::get('/forgotpassword', [UserController::class, 'forgotpassword'])->name('forgotpassword');
Route::post('/forgotpassword', [UserController::class, 'doforgotpassword'])->name('doforgotpassword');
Route::get('/resetpassword/{token}', [UserController::class, 'resetpassword'])->name('resetpassword');
Route::post('/resetpassword', [UserController::class, 'doResetPassword'])->name('doResetPassword');

Route::middleware('guest')->group(function(){
    Route::get('/login', [UserController::class, 'login'])->name('login');
    Route::post('/login', [UserController::class, 'doLogin'])->name('doLogin');
});

Route::middleware('auth')->group(function(){
    Route::get('/dashboard', [PageController::class, 'dashbaord'])->name('dashboard');
    Route::get('/dashboard/user/edit', [PageController::class, 'userEdit'])->name('user.edit');
    Route::post('/dashboard/user/update', [PageController::class, 'userUpdate'])->name('user.update');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    
    Route::get('/dashboard/pengurusdesa', [PengurusDesaController::class, 'index'])->name('pengurusdesa.index');
    Route::get('/dashboard/pengurusdesa/create', [PengurusDesaController::class, 'create'])->name('pengurusdesa.create');
    Route::post('/dashboard/pengurusdesa/store', [PengurusDesaController::class, 'store'])->name('pengurusdesa.store');
    Route::get('/dashboard/pengurusdesa/edit/{id}', [PengurusDesaController::class, 'edit'])->name('pengurusdesa.edit');
    Route::put('/dashboard/pengurusdesa/{id}', [PengurusDesaController::class, 'update'])->name('pengurusdesa.update');
    Route::delete('/dashboard/pengurusdesa{id}', [PengurusDesaController::class, 'destroy'])->name('pengurusdesa.destroy');

    
    Route::get('/dashboard/post',[PostController::class, 'index'])->name('posts.index');
    Route::get('/dashboard/post/create',[PostController::class, 'create'])->name('posts.create');
    Route::post('/dashboard/post/store',[PostController::class, 'store'])->name('posts.store');
    Route::get('/dashboard/post/edit/{id}',[PostController::class, 'edit'])->name('posts.edit');
    Route::put('/dashboard/post/{id}',[PostController::class, 'update'])->name('posts.update');
    Route::delete('/dashboard/post{id}', [PostController::class, 'destroy'])->name('posts.destroy');
    
    Route::get('/dashboard/galeri',[GaleriController::class, 'index'])->name('galeri.index');
    Route::get('/dashboard/galeri/create',[GaleriController::class, 'create'])->name('galeri.create');
    Route::post('/dashboard/galeri/store',[GaleriController::class, 'store'])->name('galeri.store');
    Route::get('/dashboard/galeri/edit/{id}',[GaleriController::class, 'edit'])->name('galeri.edit');
    Route::put('/dashboard/galeri/{id}',[GaleriController::class, 'update'])->name('galeri.update');
    Route::delete('dashboard/galeri{id}',[GaleriController::class, 'destroy'])->name('galeri.destroy');
    
    Route::get('/dashboard/infografis',[InfografisController::class, 'index'])->name('infografis.index');
    Route::get('/dashboard/infografis/create',[InfografisController::class, 'create'])->name('infografis.create');
    Route::post('/dashboard/infografis/store',[InfografisController::class, 'store'])->name('infografis.store');
    Route::get('/dashboard/infografis/edit/{id}',[InfografisController::class, 'edit'])->name('infografis.edit');
    Route::put('/dashboard/infografis/{id}',[InfografisController::class, 'update'])->name('infografis.update');
    
    Route::get('/dashboard/pengumuman',[PengumumanController::class, 'index'])->name('pengumuman.index');
    Route::get('/dashboard/pengumuman/create',[PengumumanController::class, 'create'])->name('pengumuman.create');
    Route::post('/dashboard/pengumuman/store',[PengumumanController::class, 'store'])->name('pengumuman.store');
    Route::get('/dashboard/pengumuman/edit/{id}',[PengumumanController::class, 'edit'])->name('pengumuman.edit');
    Route::put('/dashboard/pengumuman/{id}',[PengumumanController::class, 'update'])->name('pengumuman.update');
    Route::get('/dashboard/show/{file}', [PengumumanController::class, 'show'])->name('pengumuman.show');

});

