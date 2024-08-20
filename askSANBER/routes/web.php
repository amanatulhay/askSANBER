<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\JawabanController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Halaman Home
Route::get('/', [Controller::class, 'home']);

// Halaman Dashboard
Route::get('/welcome', [Controller::class, 'dashboard']);

// Auth
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// CRUD Profile
Route::resource('profile', ProfileController::class)->only(['index', 'update']);

// CRUD Kategori
Route::resource('kategori', KategoriController::class);

// CRUD Pertanyaan
Route::resource('pertanyaan', PertanyaanController::class);

// CRUD Jawaban

// Route::resource('jawaban', PertanyaanController::class);

Route::post('/jawaban/{pertanyaan_id}', [JawabanController::class, 'store']);   // Create data Jawaban


Route::get('/jawaban/{jawaban_id}/edit', [JawabanController::class, 'edit']);            // Tampil form edit Jawaban

Route::put('/jawaban/{jawaban_id}', [JawabanController::class, 'update']);               // Simpan data edit Jawaban

Route::delete('/jawaban/{jawaban_id}', [JawabanController::class, 'destroy']);             // Delete jawaban