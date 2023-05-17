@extends('layouts.app')

@section('template_title')
    {{ __('Update') }} Centro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="">
            <div class="col-md-12 custom-box-body mt-4">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Actualizar') }} Centro</span>
                        
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('centros.update', $centro->id) }}"  role="form" enctype="multipart/form-data">
                            {{ method_field('PATCH') }}
                            @csrf

                            @include('centro.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
