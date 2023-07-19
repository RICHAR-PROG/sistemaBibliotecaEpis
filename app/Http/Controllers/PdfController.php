<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;
use App\Models\libros;
class PdfController extends Controller
{
    public function view(Request $request)
    {
        $pdf = Libros::loadFile('storage/uploads/pdf/');

        return $pdf->stream();
    }
}
