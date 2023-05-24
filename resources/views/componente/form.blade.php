<div class="box box-info padding-1 custom-box-body">
    <div class="box-body">
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $componente->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('cantidad') }}
            {{ Form::text('cantidad', $componente->cantidad, ['class' => 'form-control' . ($errors->has('cantidad') ? ' is-invalid' : ''), 'placeholder' => 'Cantidad']) }}
            {!! $errors->first('cantidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('aula') }}
            {{ Form::select('aula_id', $aulas, $componente->aula_id, ['class' => 'form-control' . ($errors->has('aula_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un aula']) }}

            {!! $errors->first('aula_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>