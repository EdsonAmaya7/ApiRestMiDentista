<?php

use App\Http\Controllers\CitaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DentistaController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\UserController;
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

Route::get('/getCitasByFecha/{fecha}',[CitaController::class,'getCitasByFecha'])->name('getCitasByFecha');
Route::get('/getCitasByUser/{id}',[CitaController::class,'getCitasByUser'])->name('getCitasByUser');



Route::resource('/citas',CitaController::class)->except(['create','edit']);
Route::resource('/dentistas',DentistaController::class)->except(['create','edit']);
Route::resource('/clientes',ClienteController::class)->except(['create','edit']);
Route::resource('/users',UserController::class)->except(['create','edit']);
Route::resource('/registro',RegistroController::class)->except(['create','edit']);