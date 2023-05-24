@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Componente
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12 custom-box-body">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Componente</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('componentes.update', $componente->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('componente.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
