<?php

use App\Http\Controllers\Api\AnakController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\OrangtuaController;
use App\Http\Controllers\Api\PendidikController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('pendidik')->group(function () {
    Route::prefix('auth')
        ->controller(\App\Http\Controllers\Api\Pendidik\AuthController::class)
        ->group(function () {
            Route::post('login', 'login');
            Route::post('register', 'register');
        });
    Route::prefix('profile')
        ->controller(\App\Http\Controllers\Api\Pendidik\ProfileController::class)
        ->group(function () {
            Route::get('detail/{id}', 'detail');
        });
});

Route::prefix('orangtua')->group(function () {
    Route::prefix('auth')
        ->controller(\App\Http\Controllers\Api\Orangtua\AuthController::class)
        ->group(function () {
            Route::post('login', 'login');
            Route::post('register', 'register');
        });
    Route::prefix('profile')
        ->controller(\App\Http\Controllers\Api\Orangtua\ProfileController::class)
        ->group(function () {
            Route::get('detail/{id}', 'detail');
        });
    Route::post('anak/list', [\App\Http\Controllers\Api\Orangtua\AnakController::class, 'list']);
    Route::apiResource('anak', \App\Http\Controllers\Api\Orangtua\AnakController::class)->except('index');
});