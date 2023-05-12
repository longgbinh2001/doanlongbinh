<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\CountryController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\EpisodeController;
use App\Http\Controllers\FirebaseController;

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

Route::get('/', [IndexController::class, 'home'])->name('homepage');
Route::get('/danh-muc/{slug}', [IndexController::class, 'category'])->name('category');
Route::get('the-loai/{slug}', [IndexController::class, 'genre'])->name('genre');
Route::get('/quoc-gia/{slug}', [IndexController::class, 'country'])->name('country');
Route::get('/phim/{slug}', [IndexController::class, 'movie'])->name('movie');
Route::get('/xem-phim/{slug}', [IndexController::class, 'watch'])->name('watch');
Route::get('/so-tap', [IndexController::class, 'episode'])->name('so-tap');
Route::get('/tag/{tag}', [IndexController::class, 'tag']);
Route::get('/tim-kiem', [IndexController::class, 'timkiem'])->name('tim-kiem');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::resource('category', CategoryController::class);
Route::post('resorting', [CategoryController::class,'resorting'])->name('resorting');
Route::resource('genre', GenreController::class);
Route::resource('country', CountryController::class);
//them tap phim
Route::resource('episode', EpisodeController::class);
Route::get('/select-movie', [EpisodeController::class, 'select_movie'])->name('select-movie');


//up video
Route::resource('firebase', FirebaseController::class);
Route::post('/upload-video', [VideoController::class, 'uploadVideo'])->name('upload-video');
Route::post('/firebase/store', [FirebaseController::class, 'store'])->name('firebase.store');


Route::resource('movie', MovieController::class);
Route::get('/update_year_phim', [MovieController::class, 'update_year']);
Route::get('/update_topview-phim', [MovieController::class, 'update_topview']);
Route::get('/update_season_phim', [MovieController::class, 'update_season']);
