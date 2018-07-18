@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Formulario de Pacientes</div>
                <div class="panel-body">
                    <form action="{{ route('pacientes.store') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="rut" class="col-md-2 control-label">
                                        RUT
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" id="rut" class="form-control" name="rut" value="{{ old('rut') }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="primer_nombre" class="col-md-4 control-label">
                                        Primer Nombre
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="primer_nombre" class="form-control" name="primer_nombre" value="{{ old('primer_nombre') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="segundo_nombre" class="col-md-4 control-label">
                                        Segundo Nombre
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="segundo_nombre" class="form-control" name="segundo_nombre" value="{{ old('segundo_nombre') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido_paterno" class="col-md-4 control-label">
                                        Apellido Paterno
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="apellido_paterno" class="form-control" name="apellido_paterno" value="{{ old('apellido_paterno') }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="apellido_materno" class="col-md-4 control-label">
                                        Apellido Materno
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="apellido_materno" class="form-control" name="apellido_materno" value="{{ old('apellido_materno') }}">
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