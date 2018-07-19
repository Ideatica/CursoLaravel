@extends('layouts.app')

@section('title', 'Paciente: '.$paciente->fullName )

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Formulario de Pacientes</div>
                <div class="panel-body">
                    <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rut" class="col-md-2 control-label">
                                        RUT
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" id="rut" class="form-control" name="rut" value="{{ old('rut', $paciente->rut) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="primer_nombre" class="col-md-4 control-label">
                                        Primer Nombre
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="primer_nombre" class="form-control" name="primer_nombre" value="{{ old('primer_nombre', $paciente->primer_nombre) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="segundo_nombre" class="col-md-4 control-label">
                                        Segundo Nombre
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="segundo_nombre" class="form-control" name="segundo_nombre" value="{{ old('segundo_nombre', $paciente->segundo_nombre) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido_paterno" class="col-md-4 control-label">
                                        Apellido Paterno
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="apellido_paterno" class="form-control" name="apellido_paterno" value="{{ old('apellido_paterno', $paciente->apellido_paterno) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido_materno" class="col-md-4 control-label">
                                        Apellido Materno
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="apellido_materno" class="form-control" name="apellido_materno" value="{{ old('apellido_materno', $paciente->apellido_materno) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="pais_id" class="col-md-2 control-label">
                                        Pais
                                    </label>
                                    <div class="col-md-4">
                                        <select name="pais_id" class="form-control">
                                            @foreach(\App\Pais::orderBy('nombre', 'ASC')->get() as $pais)
                                                <option value="{{ $pais->id }}" @if($pais->id == $paciente->pais_id) selected="selected" @endif>{{ $pais->nombre }}</option>
                                            @endforeach                                             
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                    Guardar Paciente
                                </button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection