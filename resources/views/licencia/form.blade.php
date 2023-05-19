{{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Usuario') }}
            {{ Form::text('Usuario', $licencia->Usuario, ['class' => 'form-control' . ($errors->has('Usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('Usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $licencia->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_compra') }}
            {{ Form::date('fecha_compra', $licencia->fecha_compra, ['class' => 'form-control' . ($errors->has('fecha_compra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra']) }}
            {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_expiracion') }}
            {{ Form::date('fecha_expiracion', $licencia->fecha_expiracion, ['class' => 'form-control' . ($errors->has('fecha_expiracion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Expiracion']) }}
            {!! $errors->first('fecha_expiracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('programa_id') }}
            {{ Form::select('programa_id',$programa, $licencia->programa_id, ['class' => 'form-control' . ($errors->has('programa_id') ? ' is-invalid' : ''), 'placeholder' => 'Programa Id']) }}
            {!! $errors->first('programa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('aula_id', 'Aula') }}
            {{ Form::select('aula_id', $aulas, null, ['class' => 'form-control', 'id' => 'aula_id', 'placeholder' => 'Seleccionar Aula']) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('ordenador_id') }}
            {{ Form::select('ordenador_id',$ordenadore, $licencia->ordenador_id, ['class' => 'form-control' . ($errors->has('ordenador_id') ? ' is-invalid' : ''), 'placeholder' => 'Ordenador Id']) }}
            {!! $errors->first('ordenador_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>



<script>
    $(document).ready(function () {
    $('#aula_id').on('change', function () {
        var aula_id = $(this).val();
        if (aula_id) {
            $.ajax({
                url: '/api/ordenadores/' + aula_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#ordenador_id').empty();
                    $('#ordenador_id').append($('<option>', {
                        value: '',
                        text: 'Seleccionar Ordenador'
                    }));
                    $.each(data, function (key, value) {
                        $('#ordenador_id').append($('<option>', {
                            value: key,
                            text: value
                        }));
                    });
                }
            });
        } else {
            $('#ordenador_id').empty();
            $('#ordenador_id').append($('<option>', {
                value: '',
                text: 'Seleccionar Ordenador'
            }));
        }
    });
});

</script>




 --}}








{!! Form::open(['route' => ['licencias.update', $licencia->id], 'method' => 'PUT']) !!}
<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            {{ Form::label('Usuario') }}
            {{ Form::text('Usuario', $licencia->Usuario, ['class' => 'form-control' . ($errors->has('Usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('Usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $licencia->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_compra') }}
            {{ Form::date('fecha_compra', $licencia->fecha_compra, ['class' => 'form-control' . ($errors->has('fecha_compra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra']) }}
            {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_expiracion') }}
            {{ Form::date('fecha_expiracion', $licencia->fecha_expiracion, ['class' => 'form-control' . ($errors->has('fecha_expiracion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Expiracion']) }}
            {!! $errors->first('fecha_expiracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('programa_id') }}
            {{ Form::select('programa_id',$programa, $licencia->programa_id, ['class' => 'form-control' . ($errors->has('programa_id') ? ' is-invalid' : ''), 'placeholder' => 'Programa Id']) }}
            {!! $errors->first('programa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group">
            {{ Form::label('aula_id', 'Aula') }}
            {{ Form::select('aula_id', $aulas, null, ['class' => 'form-control', 'id' => 'aula_id', 'placeholder' => 'Seleccionar Aula']) }}
        </div>
        
        <div class="form-group">
            {{ Form::label('ordenador_id') }}
            {{ Form::select('ordenador_id',$ordenadore, $licencia->ordenador_id, ['class' => 'form-control' . ($errors->has('ordenador_id') ? ' is-invalid' : ''), 'placeholder' => 'Ordenador Id']) }}
            {!! $errors->first('ordenador_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>
{!! Form::close() !!}

<script>
    $(document).ready(function () {
    $('#aula_id').on('change', function () {
        var aula_id = $(this).val();
        if (aula_id) {
            $.ajax({
                url: '/api/ordenadores/' + aula_id,
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    $('#ordenador_id').empty();
                    $('#ordenador_id').append($('<option>', {
                        value: '',
                        text: 'Seleccionar Ordenador'
                    }));
                    $.each(data, function (key, value) {
                        $('#ordenador_id').append($('<option>', {
                            value: key,
                            text: value
                        }));
                    });
                }
            });
        } else {
            $('#ordenador_id').empty();
            $('#ordenador_id').append($('<option>', {
                value: '',
                text: 'Seleccionar Ordenador'
            }));
        }
    });
});

</script>
