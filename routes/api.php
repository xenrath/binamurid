<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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
            Route::post('update/{id}', 'update');
            Route::post('password/{id}', 'password');
        });
    Route::post('anak/list', [\App\Http\Controllers\Api\Pendidik\AnakController::class, 'list']);
    Route::post('report/list', [\App\Http\Controllers\Api\Pendidik\ReportController::class, 'list']);
    Route::apiResource('report', \App\Http\Controllers\Api\Pendidik\ReportController::class)->except('index');
    Route::get('mapel', [\App\Http\Controllers\Api\Pendidik\MapelController::class, 'index']);
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
            Route::post('update/{id}', 'update');
            Route::post('password/{id}', 'password');
        });
    Route::post('anak/list', [\App\Http\Controllers\Api\Orangtua\AnakController::class, 'list']);
    Route::apiResource('anak', \App\Http\Controllers\Api\Orangtua\AnakController::class)->except('index');
    Route::post('report/list', [\App\Http\Controllers\Api\Orangtua\ReportController::class, 'list']);
    Route::post('report/listpertanggal/{id}', [\App\Http\Controllers\Api\Orangtua\ReportController::class, 'listpertanggal']);
});

