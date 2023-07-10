<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuariosController;
use App\Http\Controllers\LibrosController;
use App\Http\Controllers\ReportesController;



// Route::get('/', function () {
//     return view('index');
// });

Route::view('/', 'index')->name('index');


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth.admin');
Route::resource('users', UsuariosController::class)->middleware('auth.admin');
Route::resource('libros', LibrosController::class)->middleware('auth.admin');
Route::resource('reportes', reportesController::class)->middleware('auth.admin');

// Route::get('/users/create', [UsuariosController::class,'create']);

Route::get('/userpage', function () {
    return view('userpage.page.index', [
        'header' => view('userpage.includes.header'),
        'footer' => view('userpage.includes.footer'),
    ]);
});

// Route::get('/register',[App\Http\Controllers\Auth\RegisterController::class, ''])->name('home');



