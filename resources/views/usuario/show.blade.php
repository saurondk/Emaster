@extends('layouts.app')

@section('template_title')
    {{ $usuario->usuario ?? "{{ __('Show') Usuario" }}
@endsection

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Usuario</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('usuarios.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre Curso:</strong>
                            {{ $usuario->nombre_curso }}
                        </div>
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $usuario->usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Contraseña:</strong>
                            {{ $usuario->contraseña }}
                        </div>
                        <div class="form-group">
                            <strong>Código Curso:</strong>
                            {{ $usuario->codigo_curso }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $usuario->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $usuario->fecha_fin }}
                        </div>
                        <div class="form-group">
                            <strong>Aula:</strong>
                            {{ $usuario->aula_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
