<?php

use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\KelasController;
use App\Http\Controllers\SppController;

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

route::get('/spp', [SppController::class, 'index']);
route::post('/spp', [SppController::class, 'store']);
route::get('/spp/{id_spp}/edit', [SppController::class, 'edit']);
route::put('/spp/{id_spp}/edit', [SppController::class, 'update']);
route::delete('/spp/{id_spp}', [SppController::class, 'destroy']);

Route::resource('/kelas', 'App\Http\Controllers\KelasController');