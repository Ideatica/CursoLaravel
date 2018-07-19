@extends('layouts.app')

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
                    <th class="text-center">Acciones</th>
                </tr>
                @foreach($pacientes as $paciente)
                <tr>
                    <td>{{ $paciente->id }}</td>
                    <td>{{ $paciente->rut }}</td>
                    <td>{{ $paciente->primer_nombre }} {{ $paciente->segundo_nombre }}</td>
                    <td>{{ $paciente->apellido_paterno }} {{ $paciente->apellido_materno }}</td>
                    <td class="text-center">
                        <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-xs btn-success">
                            <i class="fa fa-edit"></i>
                        </a>

                        <a href="{{ route('pacientes.delete', $paciente->id) }}" class="btn btn-xs btn-danger">
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