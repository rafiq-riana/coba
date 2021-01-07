<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KelasController;

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

// Route::get('/', function () {
//     return view('main');
// });

route::get('/kelas', [KelasController::class, 'index']);
route::post('/kelas', [KelasController::class, 'store']);
route::delete('/kelas/{id_kelas}', [KelasController::class, 'destroy']);


