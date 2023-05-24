<div class="box box-info padding-1 custom-box-body">
    <div class="box-body">
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $programa->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('version') }}
            {{ Form::text('version', $programa->version, ['class' => 'form-control' . ($errors->has('version') ? ' is-invalid' : ''), 'placeholder' => 'Version']) }}
            {!! $errors->first('version', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('tipo_licencia') }}
            {{ Form::text('tipo_licencia', $programa->tipo_licencia, ['class' => 'form-control' . ($errors->has('tipo_licencia') ? ' is-invalid' : ''), 'placeholder' => 'Tipo Licencia']) }}
            {!! $errors->first('tipo_licencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>