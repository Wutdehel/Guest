<?php

use App\Http\Controllers\KeluarMasukController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LogTamuController;
use Illuminate\Support\Facades\Auth;
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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');
Route::resource('users', \App\Http\Controllers\UserController::class)->middleware('auth');

Route::resource('pendaftaran', \App\Http\Controllers\PendaftaranController::class)->middleware('auth');

Route::resource('keluarmasuk', \App\Http\Controllers\KeluarMasukController::class)->middleware('auth');
Route::resource('keluar', \App\Http\Controllers\KeluarController::class)->middleware('auth');

Route::resource('logtamu', \App\Http\Controllers\LogTamuController::class)->middleware('auth');

Route::get('/keluarmasuk/edit/{id}', [KeluarmasukController::class, 'edit'])->name('keluarmasuk.edit');

Route::get('/search', [KeluarMasukController::class, 'search'])->name('search');

Route::get('/searchta', [LogTamuController::class, 'searchta'])->name('searchta');

Route::post('/modals', [KeluarMasukController::class, 'modals'])->name('modals');

Route::resource('daftam', \App\Http\Controllers\DaftamController::class)->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
