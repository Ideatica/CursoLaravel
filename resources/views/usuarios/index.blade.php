@extends('layouts.app')

@section('title', 'Mantenedor de Usuarios')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Correo Electronico</th>}
                    <th>Ult. actualizacion</th>
                    <th class="text-center">Acciones</th>
                </tr>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }} </td>
                    <td>{{ $usuario->mail }} </td>
                    <td>{{ $usuario->updated_at->diffForHumans() }}</td>
                    <td class="text-center">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-xs btn-success"  data-toggle="tooltip" title="Editar Paciente">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('usuarios.delete', $usuario->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar Paciente">
                            <i class="fa fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection