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
        return view('usuario.show', compact('usuario'));
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
    



    public function searchu(Request $request){
   
        $output="";
       
        $usuarios = Usuario::where('nombre_curso', 'like', '%' . $request->searchu . '%')
                ->orWhere('usuario', 'like', '%' . $request->searchu . '%')
                ->orWhereHas('aula', function ($query) use ($request) {
                    $query->where('nombre', 'like', '%' . $request->searchu . '%');
                })
                ->with('aula')
                ->get();
    
         foreach($usuarios as $usuario){
             $output.=
             '
             
             <tr>
             <td> '.$usuario->nombre_curso .'</td>
             <td> '.$usuario->usuario.'</td>
             <td> '.$usuario->contraseña .'</td>
             <td> '.$usuario->codigo_curso .'</td>
             <td> '.$usuario->fecha_inicio .'</td>
             <td> '.$usuario->fecha_fin .'</td>
             <td> '.$usuario->aula->nombre .'</td>
             <td>
             <form action="' . route('usuarios.destroy', $usuario->id) . '" method="POST">
                 <a class="btn btn-sm btn-primary" href="' . route('usuarios.show', $usuario->id) . '"><i class="fa fa-fw fa-eye"></i> ' . __('Ver') . '</a>
                 <a class="btn btn-sm btn-success" href="' . route('usuarios.edit', $usuario->id) . '"><i class="fa fa-fw fa-edit"></i> ' . __('Editar') . '</a>
                 ' . csrf_field() . '
                 ' . method_field('DELETE') . '
                 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> ' . __('Borrar') . '</button>
             </form>
         </td>
             </tr>';
             
         }
         return response ($output);
     }
    
}
