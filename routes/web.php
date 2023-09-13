<?php

use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::view('cajones','cajones')->name('cajon');
Route::view('tipos','tipos')->name('tipos');
Route::view('Cajas','Cajas')->name('cajas');
Route::view('tarifas','Tarifas')->name('cajas');
Route::view('Empresas','empresas')->name('Empresas');
Route::view('usuarios','usuarios')->name('usuarios');