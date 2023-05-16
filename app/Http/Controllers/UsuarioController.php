<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::paginate();

        return view('usuario.index', compact('usuarios'))
            ->with('i', (request()->input('page', 1) - 1) * $usuarios->perPage());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuario = new Usuario();
        $aulas = Aula::pluck('nombre', 'id');
        return view('usuario.create', compact('usuario', 'aulas'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        request()->validate(Usuario::$rules, Usuario::$messages);
        $usuario = Usuario::create($request->all());
    
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario creado correctamente.');
    }

    public function show(Usuario $usuario)
    {
        return view('usuarios.show', compact('usuario'));
    }
    
    public function edit(Usuario $usuario)
    {
        $aulas = Aula::pluck('nombre', 'id');
        return view('usuario.edit', compact('usuario', 'aulas'));
    }
    
    public function update(Request $request, Usuario $usuario)
    {
        request()->validate(Usuario::$rules, Usuario::$messages);
        $usuario->update($request->all());
    
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario actualizado correctamente.');
    }
    
    public function destroy(Usuario $usuario)
    {
        $usuario->delete();
    
        return redirect()->route('usuarios.index')
            ->with('success', 'Usuario eliminado correctamente.');
    }
    
}
