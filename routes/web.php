<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\RatingController;

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
    return view('welcome');
});

// Menampilkan daftar buku
Route::get('/book', [BookController::class, 'index'])->name('book.listBook');

// Menampilkan daftar penulis paling terkenal
Route::get('/top', [AuthorController::class, 'topFamous'])->name('authors.topFamous');

// Menampilkan formulir input rating
Route::get('/rating', [RatingController::class, 'index'])->name('rating.index');

// Menyimpan rating
Route::post('/ratings', [RatingController::class, 'store'])->name('rating.store');