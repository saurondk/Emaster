@extends('layouts.app')

@section('template_title')
    {{ $aula->name ?? "{{ __('Show') Aula" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Aula</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('aulas.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $aula->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Capacidad:</strong>
                            {{ $aula->capacidad }}
                        </div>
                        <div class="form-group">
                            <strong>Centro Id:</strong>
                            {{ $aula->centro_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
