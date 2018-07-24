@extends('layouts.app')

@section('title', 'Usuario: '.$usuario->email )

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">Editar Usuario</div>
                <div class="panel-body">
                    <form action="{{ route('usuarios.update', $usuario->id) }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="col-md-2 control-label">
                                        Nombre
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" id="name" class="form-control" name="name" value="{{ old('name', $usuario->name) }}">
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="email" class="col-md-2 control-label">
                                        E-Mail
                                    </label>
                                    <div class="col-md-4">
                                        <input type="text" id="email" class="form-control" name="email" value="{{ old('email', $usuario->email) }}">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="password" class="col-md-2 control-label">
                                        Contraseña
                                    </label>
                                    <div class="col-md-8">
                                        <input type="text" id="password" class="form-control" name="password" value="{{ old('password', $usuario->password) }}">
                                    </div>
                                </div>
                            </div>                           

                        </div>

                        <div class="row">
                            <div class="col-md-12 text-right">
                                <button type="submit" class="btn btn-success">
                                    <i class="fa fa-save"></i>
                                    Guardar usuario
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