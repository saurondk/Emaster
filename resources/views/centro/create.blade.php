@extends('layouts.app')

@section('template_title')
    {{ __('Crear') }} Centro
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row justify-content-md-center">
            <div class=" col-md-6 custom-box-body mt-4 ">

                @includeif('partials.errors')

                <div class="card card-default">
                    <div class="card-header">
                        <span class="card-title">{{ __('Crear') }} Centro</span>
                    </div>
                    <div class="card-body mx-auto">
                        <form method="POST" action="{{ route('centros.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('centro.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
