<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\BoletasController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\PrestamoController;




Route::view('/', 'index')->name('index');
Route::get('boletas/pdf',[BoletasController::class,'pdf'])->name('boletas.pdf');

Auth::routes();


Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth.admin');
Route::resource('users', UsuariosController::class)->middleware('auth.admin');
Route::resource('libros', LibroController::class)->middleware('auth');
Route::resource('reportes', reportesController::class)->middleware('auth.admin');
Route::resource('boletas', boletasController::class)->middleware('auth.admin');

Route::resource('/userpage', CatalogController::class);
Route::resource('prestamos', PrestamoController::class)->middleware('auth');
