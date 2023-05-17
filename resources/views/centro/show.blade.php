@extends('layouts.app')

@section('template_title')
    {{ $centro->name ?? "{{ __('Show') Centro" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Ver') }} Centro</span>
                        </div>
                        
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $centro->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Direccion:</strong>
                            {{ $centro->direccion }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $centro->telefono }}
                        </div>
                        <div class="float-right mt-3">
                            <a class="btn btn-primary" href="{{ route('centros.index') }}"> {{ __('Volver') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
