<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CatalogController;
use App\Models\libros;



// Route::get('/', function () {
//     return view('index');
// });

Route::view('/', 'index')->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth.admin');
Route::resource('users', UsuariosController::class)->middleware('auth.admin');
Route::resource('libros', LibrosController::class)->middleware('auth.admin');
Route::resource('reportes', ReportesController::class)->middleware('auth.admin');


Route::resource('/userpage', CatalogController::class);
