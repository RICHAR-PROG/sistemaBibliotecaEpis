<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\libros;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class CatalogController extends Controller
{
    //

    public function index()
    {
        $books = Libros::all();

        return view('userpage.page.index', compact('books'))->with('header', view('userpage.includes.header'))->with('footer', view('userpage.includes.footer'));
    
    }
    
}
