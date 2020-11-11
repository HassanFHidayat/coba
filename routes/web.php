<?php

use App\Http\Controllers\PenggunasController;
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

Route::get('/', function () {
    return view('index');
});
//Route::resource('/users', PenggunasController::class);
Route::get('/users', [PenggunasController::class, 'index']);
Route::get('/users/create', [PenggunasController::class, 'create']);
Route::get('/users/{pengguna}', [PenggunasController::class, 'show']);
Route::post('/users', [PenggunasController::class, 'store']);
Route::delete('/users/{pengguna}', [PenggunasController::class, 'destroy']);
Route::get('/users/{pengguna}/edit', [PenggunasController::class, 'edit']);
Route::patch('/users/{pengguna}', [PenggunasController::class, 'update']);