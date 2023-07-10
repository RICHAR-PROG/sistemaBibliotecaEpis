<?php

namespace App\Http\Controllers;

use App\Models\libros;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
class LibrosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['libros']=Libros::paginate();
        return view('libros.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $datosLibro=request()->except('_token');

        // return $datosLibro;

        if($request->hasFile('imagen')){
            // $datosLibro['imagen']=$request->file('imagen')->store('uploads', 'public');

            $file = $request->file('imagen');
            $nombre_archivo = time().$file->getClientOriginalName();

            //Se sube la imagen a la carpeta public/storage/libros/
            $file->move(public_path()."/storage/libros/", $nombre_archivo);

            $datosLibro['imagen'] = $nombre_archivo;

        }

        Libros::insert($datosLibro);
        return redirect('libros');
    }

    /**
     * Display the specified resource.
     */
    public function show(libros $libros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $libros=Libros::findOrFail($id);
        return view('libros.edit',compact('libros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosLibro=request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            $libros=Libros::findOrFail($id);
            $file_path = public_path().'/storage/libros/'.$libros->imagen;
            File::delete($file_path);

            $file = $request->file('imagen');
            $nombre_archivo = time().$file->getClientOriginalName();

            //Se sube la imagen a la carpeta public/storage/libros/
            $file->move(public_path()."/storage/libros/", $nombre_archivo);

            $datosLibro['imagen'] = $nombre_archivo;
        }

        Libros::where('id','=',$id)->update($datosLibro);

        $libros=Libros::findOrFail($id);
        return view('libros.edit',compact('libros'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $libro = Libros::findOrFail($id);

        $file_path = public_path().'/storage/libros/'.$libro->imagen;
        File::delete($file_path);
        $libro->delete();

        return redirect('libros');
    }
}
