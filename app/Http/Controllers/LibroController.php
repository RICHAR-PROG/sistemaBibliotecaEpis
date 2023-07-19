<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datos['libros']=Libro::paginate();
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
    // public function store(Request $request)
    // {
    //     $datosLibro=request()->except('_token','imagen', 'pdf');

    //     // return $datosLibro;

    //     if($request->hasFile('imagen')){
    //         // $datosLibro['imagen']=$request->file('imagen')->store('uploads', 'public');

    //         $file = $request->file('imagen');
    //         $nombre_archivo = time().$file->getClientOriginalName();

    //         //Se sube la imagen a la carpeta public/storage/libros/
    //         $file->move(public_path()."/storage/libros/", $nombre_archivo);

    //         $datosLibro['imagen'] = $nombre_archivo;

    //     }
    //     if ($request->hasFile('Pdf')) {
    //         $pdf = $request->file('Pdf');
    //         $nombre_pdf = time() . $pdf->getClientOriginalName();
    //         $pdf->move(public_path('storage/libros'), $nombre_pdf);
    //         $datosLibro['Pdf'] = $nombre_pdf;
    //     }

    //     Libro::insert($datosLibro);
    //     return redirect('libros');

    // }
    public function store(Request $request)
{
    $datosLibro = $request->except('_token', 'imagen', 'PDF');

    if ($request->hasFile('imagen')) {
        $imagen = $request->file('imagen');
        $nombre_imagen = time() . $imagen->getClientOriginalName();
        $imagen->move(public_path('storage/uploads/portada'), $nombre_imagen);
        $datosLibro['imagen'] = $nombre_imagen;
    }

    if ($request->hasFile('PDF')) {
        $pdf = $request->file('PDF');
        $nombre_pdf = time() . $pdf->getClientOriginalName();
        $pdf->move(public_path('storage/uploads/pdf'), $nombre_pdf);
        $datosLibro['PDF'] = $nombre_pdf;
    }

    Libro::insert($datosLibro);
        return redirect('libros');
}

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $libros=Libro::findOrFail($id);
        return view('libros.edit',compact('libros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosLibro=request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            $libros=Libro::findOrFail($id);
            $file_path = public_path().'/storage/libros/'.$libros->imagen;
            File::delete($file_path);

            $file = $request->file('imagen');
            $nombre_archivo = time().$file->getClientOriginalName();

            //Se sube la imagen a la carpeta public/storage/libros/
            $file->move(public_path()."/storage/libros/", $nombre_archivo);

            $datosLibro['imagen'] = $nombre_archivo;
        }

        Libro::where('id','=',$id)->update($datosLibro);

        $libros=Libro::findOrFail($id);
        return view('libros.edit',compact('libros'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);

        $file_path = public_path().'/storage/libros/'.$libro->imagen;
        File::delete($file_path);
        $libro->delete();

        return redirect('libros');
    }
}
