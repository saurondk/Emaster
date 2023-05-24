<div class="box box-info padding-1 ">
    <div class="box-body ">
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $centro->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('direccion') }}
            {{ Form::text('direccion', $centro->direccion, ['class' => 'form-control' . ($errors->has('direccion') ? ' is-invalid' : ''), 'placeholder' => 'Direccion']) }}
            {!! $errors->first('direccion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $centro->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono', 'maxlength' => 9]) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{-- <div class="form-group" style="width: 20rem">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $centro->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div> --}}

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>