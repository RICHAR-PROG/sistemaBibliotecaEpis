<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        $datos = User::all();

        return view('users.index', ['usuarios' => $datos ] );

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('users.create');
    }
 
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate([
            'dni' => 'required|digits:8|string|unique:users',
            'password' => 'required|min:8|string',
            'password_confirm' => 'required|same:password',
        ]);


        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dni = $request->dni;
        $user->type_user = $request->type_user;
        $user->password = Hash::make($request->password);

        $user->save();
        
        return redirect()->route('users.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(User $usuarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id )
    {
        $usuario = User::findOrFail($id);
        return view('users.edit', compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'dni' => 'required|digits:8|string',
        ]);
    
        $user->name = $request->name;
        $user->email = $request->email;
        $user->dni = $request->dni;
        $user->type_user = $request->type_user;
        
        $user->save();
        
        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('users');
    }

    public function showLoginForm()
    {
        return view('index');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('correo', 'password');

        if (Auth::attempt($credentials)) {
            // Autenticación exitosa
            return redirect()->intended('users');
        } else {
            // Autenticación fallida
            return redirect()->back()->withErrors(['correo' => 'Credenciales inválidas']);
        }
    }
}