<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Centro;
use Illuminate\Http\Request;


/**
 * Class AulaController
 * @package App\Http\Controllers
 */
class AulaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aulas = Aula::paginate();

        return view('aula.index', compact('aulas'))
            ->with('i', (request()->input('page', 1) - 1) * $aulas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $aula = new Aula();
        $centros = Centro::pluck('nombre','id');
        return view('aula.create', compact('aula','centros'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        request()->validate(Aula::$rules, Aula::$messages);
        $aula = Aula::create($request->all());

        return redirect()->route('aulas.index')
            ->with('success', 'Aula creada correctamente.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $aula = Aula::find($id);

        return view('aula.show', compact('aula'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $centros = Centro::pluck('nombre','id');
        $aula = Aula::find($id);

        return view('aula.edit', compact('aula','centros'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Aula $aula
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Aula $aula)
    {
        
        request()->validate(Aula::$rules,Aula::$messages);
        $aula->update($request->all());

        return redirect()->route('aulas.index')
            ->with('success', 'Aula actualizado correctamente');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $aula = Aula::find($id)->delete();

        return redirect()->route('aulas.index')
            ->with('Hecho', 'Aula Borrada satisfactoriamente');
    }
//    public function search(Request $request)
//      {
//         if(isset($_GET['query'])){
//            $search_text = $_GET['query'];
//            $aulas = DB::table('aulas')->where('nombre','LIKE','%'.$search_text.'%')->paginate(2);
//            return view('aulas.search',['aulas' => $aulas]);
//         }else{
//             return view('aulas.index');
//         }
       
//      }

public function search(Request $request){
   $output="";

    $aulas =Aula::where('nombre','Like','%'.$request->search.'%')->get();
    foreach( $aulas as $aulas){
        $output.=
        '
        
        <tr>
        <td> '.$aulas->nombre.'</td>
        <td> '.$aulas->capacidad.'</td>
        <td> '.$aulas->centro->nombre.'</td>
        <td>
        <form action="' . route('aulas.destroy', $aulas->id) . '" method="POST">
            <a class="btn btn-sm btn-primary" href="' . route('aulas.show', $aulas->id) . '"><i class="fa fa-fw fa-eye"></i> ' . __('Show') . '</a>
            <a class="btn btn-sm btn-success" href="' . route('aulas.edit', $aulas->id) . '"><i class="fa fa-fw fa-edit"></i> ' . __('Edit') . '</a>
            ' . csrf_field() . '
            ' . method_field('DELETE') . '
            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> ' . __('Delete') . '</button>
        </form>
    </td>
        </tr>';
        
    }
    return response ($output);
}
}
