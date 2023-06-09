@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Ordenadore
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12 custom-box-body">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Editar') }} Ordenadores</span>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('ordenadores.update', $ordenadore->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('ordenadore.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
