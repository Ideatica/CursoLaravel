@extends('layouts.app')

@section('title', 'Listado de pacientes')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <a href="{{ route('pacientes.create') }}" class="btn btn-success">
                <i class="fa fa-user-plus"></i>
                Nuevo Paciente
            </a>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            @include('flash::message')
            <table class="table">
                <tr>
                    <th>ID</th>
                    <th>RUT</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Pais</th>
                    <th>Añadido por</th>
                    <th>Ult. actualizacion</th>
                    <th class="text-center">Acciones</th>
                </tr>
                @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->rut }}</td>
                    <td>{{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }}</td>
                    <td>{{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                    <td>@if($paciente->pais){{ $paciente->pais->nombre }}@endif
                    <td>@if($paciente->usuario){{ $paciente->usuario->name }}@endif
                    <td>{{ $paciente->updated_at->diffForHumans() }}</td>
                    <td class="text-center"> 
                        <a href="{{ route('pacientes.info', $paciente->id) }}" class="btn btn-xs btn-info" data-toggle="tooltip" title="Consulta Formulario">
                            <i class="fa fa-file"></i>
                        </a>
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-xs btn-success"  data-toggle="tooltip" title="Editar Paciente">
                            <i class="fa fa-edit"></i>
                        </a>
                        @if (Auth::User()->hasRole('admin'))
                            <a href="{{ route('pacientes.delete', $paciente->id) }}" class="btn btn-xs btn-danger" data-toggle="tooltip" title="Eliminar Paciente">
                                <i class="fa fa-trash"></i>
                            </a>
                        @endif
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection