@extends('layouts.app')

@section('template_title')
    {{ $programa->name ?? "{{ __('Show') Programa" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Programa</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('programas.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $programa->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Version:</strong>
                            {{ $programa->version }}
                        </div>
                        <div class="form-group">
                            <strong>Tipo Licencia:</strong>
                            {{ $programa->tipo_licencia }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
