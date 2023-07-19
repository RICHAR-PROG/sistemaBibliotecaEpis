<?php

namespace App\Http\Controllers;

use App\Models\Libro;
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
        $books = Libro::all();

        return view('userpage.page.index', compact('books'))->with('header', view('userpage.includes.header'))->with('footer', view('userpage.includes.footer'));
    
    }
 
    

}
