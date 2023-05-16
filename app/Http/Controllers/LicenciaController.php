<?php

namespace App\Http\Controllers;

use App\Models\Aula;
use App\Models\Licencia;
use App\Models\Ordenadore;
use App\Models\Programa;
use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

/**
 * Class LicenciaController
 * @package App\Http\Controllers
 */
class LicenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     $licencias = Licencia::paginate();

    //     return view('licencia.index', compact('licencias'))
    //         ->with('i', (request()->input('page', 1) - 1) * $licencias->perPage());
    // }
    public function index()
{
    $licencias = Licencia::with('programa','ordenadore', 'ordenadore.aula')->paginate();
    $aulas = Aula::all();
    return view('licencia.index', compact('licencias','aulas'))
            ->with('i', (request()->input('page', 1) - 1) * $licencias->perPage());
}


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $licencia = new Licencia();
        $ordenadore = Ordenadore::pluck('Identificador','id');
        $aulas = Aula::pluck('nombre', 'id');
        $programa=Programa::pluck('nombre','id');
        return view('licencia.create', compact('licencia','ordenadore','programa','aulas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Licencia::$rules);

        $licencia = Licencia::create($request->all());

        return redirect()->route('licencias.index')
            ->with('success', 'Licencia Creada.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $licencia = Licencia::find($id);

        return view('licencia.show', compact('licencia'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $licencia = Licencia::find($id);
        $aulas = Aula::pluck('nombre', 'id');
        $ordenadore = Ordenadore::pluck('Identificador','id');
        $aulas = Aula::pluck('nombre', 'id');
        $programa=Programa::pluck('nombre','id');
        return view('licencia.edit', compact('licencia','ordenadore','programa','aulas'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Licencia $licencia
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Licencia $licencia)
    {
        request()->validate(Licencia::$rules);

        $licencia->update($request->all());

        return redirect()->route('licencias.index')
            ->with('success', 'Licencia Actualizada');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $licencia = Licencia::find($id)->delete();

        return redirect()->route('licencias.index')
            ->with('success', 'Licencia Borrada');
    }

    public function searchl(Request $request){
       
        $output="";
       
        $licencias = Licencia::where('Usuario', 'like', '%' . $request->searchl . '%')
                ->orWhere('clave', 'like', '%' . $request->searchl . '%')
                ->orWhereHas('ordenadore', function ($query) use ($request) {
                    $query->where('Identificador', 'like', '%' . $request->searchl . '%');
                })
                ->orWhereHas('ordenadore.aula', function ($query) use ($request) {
                    $query->where('nombre', 'like', '%' . $request->searchl . '%');
                })
                ->with(['programa', 'ordenadore.aula'])
                ->get();
                

         foreach( $licencias as $licencias){
             $output.=
             '
             
             <tr>
             <td> '.$licencias->Usuario .'</td>
             <td> '.$licencias->clave.'</td>
             <td> '.$licencias->fecha_compra .'</td>
             <td> '.$licencias->fecha_expiracion .'</td>
             <td> '.$licencias->programa->nombre .'</td>
             <td> '.$licencias->ordenadore->Identificador .'</td>
             <td> '.$licencias->ordenadore->aula->nombre.'</td>
             <td>
             <form action="' . route('licencias.destroy', $licencias->id) . '" method="POST">
                 <a class="btn btn-sm btn-primary" href="' . route('licencias.show', $licencias->id) . '"><i class="fa fa-fw fa-eye"></i> ' . __('Ver') . '</a>
                 <a class="btn btn-sm btn-success" href="' . route('licencias.edit', $licencias->id) . '"><i class="fa fa-fw fa-edit"></i> ' . __('Editar') . '</a>
                 ' . csrf_field() . '
                 ' . method_field('DELETE') . '
                 <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> ' . __('Borrar') . '</button>
             </form>
         </td>
             </tr>';
             
         }
         return response ($output);
     }
    

     public function exportExcel(Request $request)
     {
        $search = $request->input('searchl');

        $licencias = Licencia::with(['programa', 'ordenadore', 'ordenadore.aula'])
                    ->where('Usuario', 'like', '%' . $search . '%')
                    ->orWhere('clave', 'like', '%' . $search . '%')
                    ->orWhereHas('ordenadore', function ($query) use ($search) {
                        $query->where('Identificador', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('ordenadore.aula', function ($query) use ($search) {
                        $query->where('nombre', 'like', '%' . $search . '%');
                    })
                    ->get();
        
        
     
         $spreadsheet = new Spreadsheet();
         $sheet = $spreadsheet->getActiveSheet();
     
         // Agregar los encabezados de las columnas
         $sheet->setCellValue('A1', 'Usuario');
         $sheet->setCellValue('B1', 'Clave');
         $sheet->setCellValue('C1', 'Fecha Compra');
         $sheet->setCellValue('D1', 'Fecha Expiracion');
         $sheet->setCellValue('E1', 'Programa');
         $sheet->setCellValue('F1', 'Ordenador');
         $sheet->setCellValue('G1', 'Aula');
     
         // Agregar los datos de las licencias
         $row = 2;
         foreach ($licencias as $licencia) {
             if ($licencia->Usuario && $licencia->programa && $licencia->ordenadore && $licencia->ordenadore->aula) {
                 $sheet->setCellValue('A' . $row, $licencia->Usuario);
                 $sheet->setCellValue('B' . $row, $licencia->clave);
                 $sheet->setCellValue('C' . $row, $licencia->fecha_compra);
                 $sheet->setCellValue('D' . $row, $licencia->fecha_expiracion);
                 $sheet->setCellValue('E' . $row, $licencia->programa->nombre);
                 $sheet->setCellValue('F' . $row, $licencia->ordenadore->Identificador);
                 $sheet->setCellValue('G' . $row, $licencia->ordenadore->aula->nombre);
                 $row++;
             }
         }
     
         $writer = new Xlsx($spreadsheet);
     
         // Establecer encabezados para la descarga
         header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
         header('Content-Disposition: attachment;filename="Licencias.xlsx"');
         header('Cache-Control: max-age=0');
     
         $writer->save('php://output'); // Enviar el archivo generado al navegador para su descarga
     }
     


}
