<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\indexController;

// admin controller
use App\Http\Controllers\categoryController;
use App\Http\Controllers\countryController;
use App\Http\Controllers\episodeController;
use App\Http\Controllers\genreController;
use App\Http\Controllers\movieController;
use App\Models\category;

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

Route::get('/', [indexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [indexController::class, 'category'])->name('category');
Route::get('/the-loai/{slug}', [indexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [indexController::class, 'country'])->name('country');
Route::get('/phim', [indexController::class, 'movie'])->name('movie');
Route::get('/xem-phim', [indexController::class, 'watch'])->name('watch');
Route::get('/tap-phim', [indexController::class, 'episode'])->name('episode');


Auth::routes();

Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// route admin

Route::resource('category', categoryController::class);


Route::post('resorting', [categoryController::class, 'resorting'])->name('resorting');
Route::resource('genre', genreController::class);
Route::post('resorting', [genreController::class, 'resorting'])->name('resorting');

Route::resource('country', countryController::class);
Route::post('resorting', [countryController::class, 'resorting'])->name('resorting');


Route::resource('episode', episodeController::class);
Route::resource('movie', movieController::class);