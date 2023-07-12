<?php

namespace App\Http\Controllers;

use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
//use Barryvdh\DomPDF\PDF;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class BoletasController extends Controller
{
    public function index()
    {
        
        $datos = User::all();

        return view('boletas.index', ['boletas' => $datos ] );

    }
    
    public function pdf()
    {
        /*$datos['users']=User::paginate();
        return view('boletas.index',$datos);*/
        $users=User::paginate();
        $pdf=PDF::loadView('boletas.pdf',['users'=>$users]);
       // return view('boletas.index',compact('users'));
       return $pdf->stream();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        
    }
}
