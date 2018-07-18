<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Paciente;

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
        $paciente = new Paciente($request->all());
        $paciente->save();

        return redirect()->route('pacientes.index');
    }

    public function delete($id)
    {
        if($paciente = Paciente::find($id))
        { 
            $paciente->delete();
            return redirect()->route('pacientes.index');
        }
        abort(404);
    }
}
