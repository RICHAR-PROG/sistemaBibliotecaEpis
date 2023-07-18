<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\ReportesController;
use App\Http\Controllers\CatalogController;
use App\Http\Controllers\BoletasController;
use App\Http\Controllers\PrestamosController;
use App\Models\libros;



// Route::get('/', function () {
//     return view('index');
// });

Route::view('/', 'index')->name('index');
Route::get('boletas/pdf',[BoletasController::class,'pdf'])->name('boletas.pdf');

Auth::routes();



Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth.admin');
Route::resource('users', UsuariosController::class);
Route::resource('libros', LibrosController::class);
Route::resource('reportes', reportesController::class)->middleware('auth.admin');
Route::resource('boletas', boletasController::class)->middleware('auth.admin');

Route::resource('/userpage', CatalogController::class);
Route::post('/prestamos/prestar', [PrestamosController::class, 'prestarLibro'])->name('prestamos.prestar');
