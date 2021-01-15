<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\KelasController;

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

Route::get('/', function () {
    return view('main');
});

// route::get('/kelas', [KelasController::class, 'index']);
// route::post('/kelas', [KelasController::class, 'store']);
// route::get('/kelas/{id_kelas}/edit', [KelasController::class, 'edit']);
// route::put('/kelas/{id_kelas}/edit', [KelasController::class, 'update']);
// route::delete('/kelas/{id_kelas}', [KelasController::class, 'destroy']);

Route::resource('/kelas', 'App\Http\Controllers\KelasController');