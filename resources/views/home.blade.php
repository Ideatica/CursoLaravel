@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Escritorio aplicación:</div>

                <div class="panel-body">

                    <p> Resumen: </p>

                    <br>
                    <p> Total pacientes: {{ \App\Paciente::all()->count() }} </p>
                    <br>
                    <p> Total usuarios: {{ \App\User::all()->count() }} </p>

                    <a href="{{ route('pacientes.create') }}" class="btn btn-success">
                        <i class="fa fa-user-plus"></i>
                        Crear Paciente
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
