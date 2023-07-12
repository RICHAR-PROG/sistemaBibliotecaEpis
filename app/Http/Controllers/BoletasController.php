<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;

use Illuminate\Http\Request;

class BoletasController extends Controller
{
        public function pdf()
    {
        $users=User::paginate();
        $pdf=PDF::loadView('boletas.pdf',['users'=>$users]);
       // return view('boletas.index',compact('users'));
       return $pdf->stream();
    }
}
