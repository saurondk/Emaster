@extends('layouts.app')

@section('template_title')
    {{ $ordenadore->name ?? "{{ __('Show') Ordenadore" }}
@endsection

@section('content')

    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Ordenadore</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('ordenadores.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Identificador:</strong>
                            {{ $ordenadore->Identificador }}
                        </div>
                        <div class="form-group">
                            <strong>Marca:</strong>
                            {{ $ordenadore->marca }}
                        </div>
                        <div class="form-group">
                            <strong>Modelo:</strong>
                            {{ $ordenadore->modelo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $ordenadore->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Ip:</strong>
                            {{ $ordenadore->ip }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Compra:</strong>
                            {{ $ordenadore->fecha_compra }}
                        </div>
                        <div class="form-group">
                            <strong>Aula Id:</strong>
                            {{ $ordenadore->aula_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
