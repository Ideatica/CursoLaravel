<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\Paciente;
use Auth;
use PDF;

class PacientesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pacientes = Paciente::all();
        
        return view('pacientes.index')
            ->with('pacientes', $pacientes);
    }

    public function create()
    {
        return view('pacientes.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $paciente = new Paciente($request->all());
        $paciente->user_id = $user->id;
        $paciente->save();

        Flash::success('El paciente ha sido creado correctamente');
        return redirect()->route('pacientes.index');
    }

    public function edit($id){

        $paciente = Paciente::findOrFail($id);

        return view('pacientes.edit')
            ->with('paciente', $paciente);
    }

    public function update(Request $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->fill($request->all());
        $paciente->save();

        Flash::success('El paciente ha sido actualizado');
        return redirect()->route('pacientes.index');
    } 


    public function delete($id)
    {
        if($paciente = Paciente::find($id))
        { 
            $paciente->delete();
            Flash::success('El paciente ha sido eliminado correctamente');
            return redirect()->route('pacientes.index');
        }
        Flash::error('El paciente seleccionado no existe');
        return redirect()->route('pacientes.index');
    }

    public function info($id){

        $paciente = Paciente::findOrFail($id);

        return view('pacientes.info')
            ->with('paciente', $paciente);
    }


    // Exportar a PDF
    public function export($id){

        $paciente = Paciente::findOrFail($id);

        $render = view('pacientes.info')
            ->with('paciente', $paciente)
            ->render();

        $pdf = PDF::loadHTML($render);
        $pdf->setWarnings(false);

        $pdf->setOptions([
            'dpi' => 100,
            'defaultPaperSize' => 'letter',
            'isPhpEnabled' => true,
            'defaultFont' => 'sans-serif'
            // fontDir
        ]);

        return $pdf->stream('paciente_'.$paciente->id.'.pdf');
    }

}
