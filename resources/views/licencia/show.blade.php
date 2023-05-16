@extends('layouts.app')

@section('template_title')
    {{ $licencia->name ?? "{{ __('Show') Licencia" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Licencia</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('licencias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Usuario:</strong>
                            {{ $licencia->Usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Clave:</strong>
                            {{ $licencia->clave }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Compra:</strong>
                            {{ $licencia->fecha_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Expiracion:</strong>
                            {{ $licencia->fecha_expiracion }}
                        </div>
                        <div class="form-group">
                            <strong>Programa:</strong>
                            {{ $licencia->programa->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Ordenador Id:</strong>
                            {{ $licencia->ordenadore->Identificador }}
                        </div>

                        <div class="form-group">
                            <strong>Aula:</strong>
                            {{  $licencia->ordenadore->aula->nombre }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
