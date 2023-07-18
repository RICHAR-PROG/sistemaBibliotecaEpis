<?php

namespace App\Http\Controllers;

use App\Models\libros;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\Prestamos;

class PrestamosController extends Controller
{
    public function prestarLibro(Request $request)
    {
        // Obtenemos los datos del libro y el usuario
        $libro = Libros::findOrFail($request->libro_id);
        $user = User::findOrFail($request->user_id);

        // Verificamos que haya stock disponible del libro
        if ($libro->stock <= 0) {
            return response()->json(['message' => 'No hay stock disponible para prestar este libro.'], 400);
        }

        // Creamos un nuevo registro en la tabla de préstamos
        $prestamo = new Prestamos;
        $prestamo->user_id = $user->id;
        $prestamo->libro_id = $libro->id;
        $prestamo->fecha_prestamo = $request->fecha_prestamo;
        $prestamo->save();

        // Actualizamos el stock del libro
        $libro->stock--;
        $libro->save();

        // Devolvemos una respuesta exitosa
        return redirect()->route('userpage.page.index')->with('success', '¡Informe subido con éxito!');

        // return response()->json(['message' => 'El préstamo se ha registrado exitosamente.'], 200);
    }

    public function devolverLibro(Request $request)
    {
        $user = User::find($request->user_id);
        $libro = Libros::find($request->libro_id);
        $fecha_devolucion = Carbon::parse($request->fecha_devolucion);

        // Registramos la devolución
        $user->libros()->updateExistingPivot($libro->id, ['fecha_devolucion' => $fecha_devolucion]);

        // Actualizamos el stock del libro
        $libro->stock++;

        return response()->json(['message' => 'El libro se ha devuelto correctamente.']);
    }
}
