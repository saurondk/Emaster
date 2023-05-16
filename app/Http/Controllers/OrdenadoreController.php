<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Ordenadore;
use Illuminate\Http\Request;

/**
 * Class OrdenadoreController
 * @package App\Http\Controllers
 */
class OrdenadoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ordenadores = Ordenadore::paginate();

        return view('ordenadore.index', compact('ordenadores'))
            ->with('i', (request()->input('page', 1) - 1) * $ordenadores->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ordenadore = new Ordenadore();
        $aulas = Aula::pluck('nombre','id');
        return view('ordenadore.create', compact('ordenadore','aulas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Ordenadore::$rules);

        $ordenadore = Ordenadore::create($request->all());

        return redirect()->route('ordenadores.index')
            ->with('success', 'Ordenadore creado satisfactoriamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $ordenadore = Ordenadore::find($id);

        return view('ordenadore.show', compact('ordenadore'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ordenadore = Ordenadore::find($id);
        $aulas = Aula::pluck('nombre','id');
        return view('ordenadore.edit', compact('ordenadore','aulas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Ordenadore $ordenadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ordenadore $ordenadore)
    {
        request()->validate(Ordenadore::$rules);

        $ordenadore->update($request->all());

        return redirect()->route('ordenadores.index')
            ->with('success', 'Ordenador Actualizado');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $ordenadore = Ordenadore::find($id)->delete();

        return redirect()->route('ordenadores.index')
            ->with('success', 'Ordenador Borrado satisfactoriamente');
    }
    
    public function searcho(Request $request){
        $output="";
     
        //  $ordenadores =Ordenadore::where('Identificador','Like','%'.$request->searcho.'%')->get();
        // $ordenadores = Ordenadore::where('Identificador', 'like', '%' . $request->searcho . '%')
        //                  ->join('aula', 'Ordenadore.aula_id', '=', 'aula.id')
        //                  ->orwhere('aula.nombre', '=',$request->searcho )
        //                  ->get();
        $ordenadores = Ordenadore::where('Identificador', 'like', '%' . $request->searcho . '%')
                         ->join('aulas', 'ordenadores.aula_id', '=', 'aulas.id')
                         ->orwhere('aulas.nombre', 'like', '%' . $request->searcho . '%')
                         ->orWhere('ip', 'like', '%' . $request->searcho . '%')
                         ->get();

         foreach( $ordenadores as $ordenadores){
             $output.=
             '
             
             <tr>
             <td> '.$ordenadores->Identificador.'</td>
             <td> '.$ordenadores->marca.'</td>
             <td> '.$ordenadores->modelo.'</td>
             <td> '.$ordenadores->descripcion.'</td>
             <td> '.$ordenadores->ip.'</td>
             <td> '.$ordenadores->fecha_compra.'</td>
             <td> '.$ordenadores->aula->nombre.'</td>
             <td>
             <form action="' . route('ordenadores.destroy', $ordenadores->id) . '" method="POST">
                 <a class="btn btn-sm btn-primary" href="' . route('ordenadores.show', $ordenadores->id) . '"><i class="fa fa-fw fa-eye"></i> ' . __('Show') . '</a>
                 <a class="btn btn-sm btn-success" href="' . route('ordenadores.edit', $ordenadores->id) . '"><i class="fa fa-fw fa-edit"></i> ' . __('Edit') . '</a>
                 ' . csrf_field() . '
                 ' . method_field('DELETE') . '
                 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> ' . __('Delete') . '</button>
             </form>
         </td>
             </tr>';
             
         }
         return response ($output);
     }
     public function getOrdenadoresPorAula($aula_id)
{
    $ordenadores = Ordenadore::where('aula_id', $aula_id)->pluck('Identificador', 'id');
    return response()->json($ordenadores);
}
}
