
{!! Form::open(['route' => ['licencias.store'], 'method' => 'POST']) !!}
<div class="box box-info padding-1 custom-box-body">
    <div class="box-body">
        <div class="form-group"  style="width: 20rem">
            {{ Form::label('Usuario') }}
            {{ Form::text('Usuario', $licencia->Usuario, ['class' => 'form-control' . ($errors->has('Usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('Usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group"  style="width: 20rem">
            {{ Form::label('clave') }}
            {{ Form::text('clave', $licencia->clave, ['class' => 'form-control' . ($errors->has('clave') ? ' is-invalid' : ''), 'placeholder' => 'Clave']) }}
            {!! $errors->first('clave', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('fecha_compra') }}
            <div class="input-group date">
                {{ Form::text('fecha_compra', $licencia->fecha_compra, ['class' => 'form-control' . ($errors->has('fecha_compra') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Compra']) }}
                <span class="input-group-append">
                    <span class="input-group-text bg-light d-block">
                        <i class="far fa-calendar fa-lg "></i>
                    </span>
                  </span>
            </div>
            {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('fecha_expiracion') }}
            <div class="input-group date">
                {{ Form::text('fecha_expiracion', $licencia->fecha_expiracion, ['class' => 'form-control' . ($errors->has('fecha_expiracion') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Expiracion']) }}
                <span class="input-group-append">
                    <span class="input-group-text bg-light d-block">
                        <i class="far fa-calendar fa-lg "></i>
                    </span>
                  </span>
            </div>
            {!! $errors->first('fecha_expiracion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group"  style="width: 20rem">
            {{ Form::label('programa_id') }}
            {{ Form::select('programa_id',$programa, $licencia->programa_id, ['class' => 'form-control' . ($errors->has('programa_id') ? ' is-invalid' : ''), 'placeholder' => 'Programa Id']) }}
            {!! $errors->first('programa_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

        <div class="form-group"  style="width: 20rem">
            {{ Form::label('aula_id', 'Aula') }}
            {{ Form::select('aula_id', $aulas, null, ['class' => 'form-control', 'id' => 'aula_id', 'placeholder' => 'Seleccionar Aula']) }}
        </div>
        
        <div class="form-group"  style="width: 20rem">
            {{ Form::label('ordenador_id') }}
            {{ Form::select('ordenador_id',$ordenadore, $licencia->ordenador_id, ['class' => 'form-control' . ($errors->has('ordenador_id') ? ' is-invalid' : ''), 'placeholder' => 'Ordenador Id']) }}
            {!! $errors->first('ordenador_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
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
<script type="text/javascript">
    $(document).ready(function(){
     $('.date').datepicker({
     format: 'yyyy-mm-dd',
     language: 'es',
     autoclose: true,
     todayHighlight: true
 });
});
 </script>