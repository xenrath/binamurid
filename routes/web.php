<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrangtuaController;
use App\Http\Controllers\PendidikController;
use App\Http\Controllers\AnakController;
use App\Http\Controllers\MapelController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware('auth')->group(function () {
  Route::get('/', [HomeController::class, 'index']);
  Route::resource('pendidik', PendidikController::class);
  Route::resource('orangtua', OrangtuaController::class);
  Route::resource('anak', AnakController::class);
  Route::resource('mapel', MapelController::class)->except('show');
});