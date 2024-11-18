<?php

use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PengurusDesaController;

Route::get('/', [PageController::class, 'index'])->name('home');
Route::get('/galeri', [PageController::class, 'gallery']);
Route::get('/sejarah', [PageController::class, 'sejarah']);
Route::get('/login', [PageController::class, 'login']);
Route::get('/blog', [PageController::class, 'blog'])->name('blog');
Route::get('/article/{slug}', [PageController::class, 'article'])->name('article');
Route::get('/dashboard', [PageController::class, 'dashbaord'])->name('dashboard');

Route::get('/dashboard/pengurusdesa', [PengurusDesaController::class, 'index'])->name('pengurusdesa.index');
Route::get('/dashboard/pengurusdesa/create', [PengurusDesaController::class, 'create'])->name('pengurusdesa.create');
Route::post('/dashboard/pengurusdesa/store', [PengurusDesaController::class, 'store'])->name('pengurusdesa.store');
Route::get('/dashboard/pengurusdesa/edit/{id}', [PengurusDesaController::class, 'edit'])->name('pengurusdesa.edit');
Route::put('/dashboard/pengurusdesa/{id}', [PengurusDesaController::class, 'update'])->name('pengurusdesa.update');

Route::get('/dashboard/post',[PostController::class, 'index'])->name('posts.index');
Route::get('/dashboard/post/create',[PostController::class, 'create'])->name('posts.create');
Route::post('/dashboard/post/store',[PostController::class, 'store'])->name('posts.store');
Route::get('/dashboard/post/edit/{id}',[PostController::class, 'edit'])->name('posts.edit');
Route::put('/dashboard/post/{id}',[PostController::class, 'update'])->name('posts.update');


Route::get('/dashboard/galeri',[GaleriController::class, 'index'])->name('galeri.index');
Route::get('/dashboard/galeri/create',[GaleriController::class, 'create'])->name('galeri.create');
Route::post('/dashboard/galeri/store',[GaleriController::class, 'store'])->name('galeri.store');
Route::get('/dashboard/galeri/edit/{id}',[GaleriController::class, 'edit'])->name('galeri.edit');
Route::put('/dashboard/galeri/{id}',[GaleriController::class, 'update'])->name('galeri.update');