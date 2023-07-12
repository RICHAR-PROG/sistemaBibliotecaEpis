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

        User::insert($datosLibro);
        return redirect('libros');
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
        $libros=User::findOrFail($id);
        return view('libros.edit',compact('libros'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $datosLibro=request()->except(['_token','_method']);
        if($request->hasFile('imagen')){
            $libros=User::findOrFail($id);
            $file_path = public_path().'/storage/libros/'.$libros->imagen;
            File::delete($file_path);

            $file = $request->file('imagen');
            $nombre_archivo = time().$file->getClientOriginalName();

            //Se sube la imagen a la carpeta public/storage/libros/
            $file->move(public_path()."/storage/libros/", $nombre_archivo);

            $datosLibro['imagen'] = $nombre_archivo;
        }

        User::where('id','=',$id)->update($datosLibro);

        $libros=User::findOrFail($id);
        return view('libros.edit',compact('libros'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $libro = User::findOrFail($id);

        $file_path = public_path().'/storage/libros/'.$libro->imagen;
        File::delete($file_path);
        $libro->delete();

        return redirect('libros');
    }
}
