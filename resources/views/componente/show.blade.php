@extends('layouts.app')

@section('template_title')
    {{ $componente->name ?? "{{ __('Show') Componente" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Componente</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('componentes.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $componente->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Cantidad:</strong>
                            {{ $componente->cantidad }}
                        </div>
                        <div class="form-group">
                            <strong>Aula Id:</strong>
                            {{ $componente->aula_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
