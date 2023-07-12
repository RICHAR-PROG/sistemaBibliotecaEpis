<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Models;
use App\Models\libros;
use Illuminate\Http\Request;
use App\Models\Reportes;
use App\Models\User;
class ReportesController extends Controller
{
    public function index()
    {
        $user = User::where('type_user','user')->count();
        $title = libros::all()->count();
        $provided = Reportes::all()->count();
        $returned = Reportes::all()->count();
        return view('reportes.indexReportes', compact('user','title','provided','returned'));
        // return view('reportes.indexReportes');
    }
    public function charts()
    {
        //
    }

}
