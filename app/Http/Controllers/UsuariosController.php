<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;
use App\User;
use Auth;
use Excel;

class UsuariosController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $usuarios = User::all();
        
        return view('usuarios.index')
            ->with('usuarios', $usuarios);
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $user = Auth::user();

        $usuario = new User($request->all());
        $usuario->user_id = $user->id;
        $usuario->save();

        Flash::success('El paciente ha sido creado correctamente');
        return redirect()->route('usuarios.index');
    }

    public function edit($id){

        $usuario = User::findOrFail($id);
        return view('usuarios.edit')
            ->with('usuario', $usuario);
    }

    public function update(Request $request, $id)
    {
        $usuario = User::findOrFail($id);
        $usuario->fill($request->all()); 
        if($request->clave){
            $usuario->password = bcrypt($request->clave);
        }

        $usuario->roles()->sync([]);
        if($request->roles)
            $usuario->roles()->sync($request->roles);

        $usuario->save();

        Flash::success('El usuario ha sido actualizado');
        return redirect()->route('usuarios.index');
    } 

    public function delete($id)
    {
        if($usuario = User::find($id))
        { 
            $usuario->delete();
            Flash::success('El usuario ha sido eliminado correctamente');
            return redirect()->route('usuarios.index');
        }
        Flash::error('El usuario seleccionado no existe');
        return redirect()->route('usuarios.index');
    }

    public function approve($id)
    {
        if($usuario = User::find($id))
        {
            if(!$usuario->hasRole('user'))
            {
                if($rol_usuario = \App\Role::where('name', 'user')->first())
                {
                    $usuario->attachRole($rol_usuario);
                    Flash::success('El usuario fue aprobado');
                    return redirect()->route('usuarios.index');
                }
            }else{
                Flash::error('El usuario ya ha sido aprobado');
                return redirect()->route('usuarios.index');
            }
        }
        Flash::error('El usuario seleccionado no existe');
        return redirect()->route('usuarios.index');
    }

    public function export()
    {
        Excel::create('Listado_Usuarios', function($excel){
            $excel->sheet('Usuarios', function($sheet){

                $data = [];
                $headings = [
                    'Nombre',
                    'Correo electrónico',
                    'Rol de usuario',
                    'Fecha creación',
                    'Últ. Actualizacion'
                ];

                $users = User::all();
                foreach ($users as $user) {
                    $data[] = [
                        $user->name,
                        $user->email,
                        $user->rol,
                        $user->created_at,
                        $user->update_at
                    ];
                }
                $sheet->fromArray($data, null, 'A1', false, false);
                $sheet->prependRow(1, $headings);
            });
        })->download('xls');

        return $pdf->stream('nombre_archivo.pdf');
    }
}
