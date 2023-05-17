<div class="box box-info padding-1 custom-box-body">
    <div class="box-body ">
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $aula->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mt-2" style="width: 20rem">
            {{ Form::label('capacidad del aula') }}
            {{ Form::number('capacidad', $aula->capacidad, ['class' => 'form-control' . ($errors->has('capacidad') ? ' is-invalid' : ''), 'style' => 'width:5rem']) }}
            {!! $errors->first('capacidad', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group mt-2" style="width: 20rem">
            {{ Form::label('centro') }}
            {{ Form::select('centro_id',$centros, $aula->centro_id, ['class' => 'form-control' . ($errors->has('centro_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un centro']) }}
            {!! $errors->first('centro_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>