<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\BoletasController;
use App\Models\libros;



// Route::get('/', function () {
//     return view('index');
// });

Route::view('/', 'index')->name('index');
Route::get('boletas/pdf',[BoletasController::class,'pdf'])->name('boletas.pdf');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth.admin');
Route::resource('users', UsuariosController::class)->middleware('auth.admin');
Route::resource('libros', LibrosController::class)->middleware('auth.admin');
Route::resource('reportes', reportesController::class)->middleware('auth.admin');

Route::resource('/userpage', CatalogController::class);
