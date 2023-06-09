@extends('layouts.app')

@section('template_title')
    {{ __('Editar') }} Aula
@endsection

@section('content')
    <section class="content container-fluid  custom-box-body">
        <div class="">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Aula</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('aulas.update', $aula->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('aula.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
