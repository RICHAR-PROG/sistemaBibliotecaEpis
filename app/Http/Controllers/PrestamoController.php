<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Prestamo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user_id = Auth::user()->id;

        if (Auth::user()->type_user == "admin") {
            $prestamos = Prestamo::all()->sortByDesc("id");;
            return view('prestamos.index', compact('prestamos'));

        } else if (Auth::user()->type_user == "user"){
            $prestamos = Prestamo::where('user_id', $user_id)->latest()->get();
            return view('userpage.prestamos.index', compact('prestamos'));
        }

    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $prestamo = new Prestamo();
        $prestamo->user_id = Auth::user()->id;
        $prestamo->libro_id = $request->book_id;
        $prestamo->estado = "SOLICITADO";

        $prestamo->save();

        return redirect()->route('prestamos.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {

        $fecha_actual = date("Y-m-d");

        if ($request->estado == "ACEPTADO") {
            $prestamo->fecha_prestamo = $fecha_actual;

            $libro = Libro::findOrFail( $request->libro_id);
            $libro->stock = $libro->stock - 1;
            // return $libro;
            $libro->save();

        }else if($request->estado == "DEVUELTO"){
            $prestamo->fecha_devolucion = $fecha_actual;

            $libro = Libro::findOrFail( $request->libro_id);
            $libro->stock = $libro->stock + 1;
            $libro->save();


        }

        $prestamo->estado = $request->estado;
        $prestamo->save();

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
