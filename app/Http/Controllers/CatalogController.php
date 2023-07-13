<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\libros;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Barryvdh\DomPDF\Facade\Pdf;


class CatalogController extends Controller
{
    //

    public function index()
    {
        $books = Libros::all();

        return view('userpage.page.index', compact('books'))->with('header', view('userpage.includes.header'))->with('footer', view('userpage.includes.footer'));
    
    }
    // public function show($estado)
    // {
    //     $libro = Libros::find($estado);
    //     return view('userpage.page.index', ['libro' => $libro]);
    // }
    public function showPdf($filename)
{
    $pdfPath = storage_path("/storage/uploads/pdf/.{$filename}");

    if (!file_exists($pdfPath)) {
        abort(404);
    }

    $headers = [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'inline; filename="' . $filename . '"',
    ];

    return response()->file($pdfPath, $headers);
}

}
