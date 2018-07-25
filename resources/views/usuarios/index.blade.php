@extends('layouts.app')

@section('title', 'Mantenedor de Usuarios')

@section('content')
<style type="text/css">
    .btn-verde {
        background-color: #088A08;
        border-color: #088A08;
        color : #fff;
    }
    .btn-verde:hover {
        
        color : #000;
    }
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')

             <div class="row">
                <div class="col-md-12 text-right">

                    <a href= "{{route('usuarios.export')}}" class ="btn btn-verde ">

                        <i class="fa fa-file-excel-o" style="margin-right:10px"></i>  Exportar Excel  
                                                   
                    </a>          

                </div>
            </div>
            <br>
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>Roles</th>
                    <th>Nombre</th>
                    <th>Correo Electronico</th>
                    <th>Ult. actualizacion</th>
                    <th class="text-right">Acciones</th>
                </tr>
                @foreach($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>
                        @foreach($usuario->roles as $rol)
                            @if($rol->name == 'admin')
                                <span class="label label-danger">{{ $rol->display_name }}</span>
                            @else
                                <span class="label label-warning">{{ $rol->display_name }}</span>
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $usuario->name }} </td>
                    <td>{{ $usuario->email }} </td>
                    <td>{{ $usuario->updated_at->diffForHumans() }}</td>
                    <td class="text-right">

                        @if(!$usuario->hasRole('user') && !$usuario->hasRole('admin'))
                        <a href="{{ route('usuarios.approve', $usuario->id) }}" class="btn btn-xs btn-success" data-toggle="tooltip" title="Aprobar Usuario">
                            <i class="fa fa-check"></i>
                        </a>
                        @endif

                        <a href="{{ route('usuarios.edit', $usuario->id) }}" class="btn btn-xs btn-warning" data-toggle="tooltip" title="Editar Usuario">
                            <i class="fa fa-edit"></i>
                        </a>
                        <a href="{{ route('usuarios.delete', $usuario->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar Usuario">
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