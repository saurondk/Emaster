{{-- <div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('nombre_curso') }}
            {{ Form::text('nombre_curso', $usuario->nombre_curso, ['class' => 'form-control' . ($errors->has('nombre_curso') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Curso']) }}
            {!! $errors->first('nombre_curso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('usuario') }}
            {{ Form::text('usuario', $usuario->usuario, ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('contraseña') }}
            {{ Form::text('contraseña', $usuario->contraseña, ['class' => 'form-control' . ($errors->has('contraseña') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) }}
            {!! $errors->first('contraseña', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('aula') }}
            {{ Form::select('aula_id', $aulas, $usuario->aula_id, ['class' => 'form-control' . ($errors->has('aula_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un aula']) }}
            {!! $errors->first('aula_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div> --}}

<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('nombre_curso') }}
            {{ Form::text('nombre_curso', $usuario->nombre_curso, ['class' => 'form-control' . ($errors->has('nombre_curso') ? ' is-invalid' : ''), 'placeholder' => 'Nombre Curso']) }}
            {!! $errors->first('nombre_curso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('usuario') }}
            {{ Form::text('usuario', $usuario->usuario, ['class' => 'form-control' . ($errors->has('usuario') ? ' is-invalid' : ''), 'placeholder' => 'Usuario']) }}
            {!! $errors->first('usuario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('contraseña') }}
            {{ Form::password('contraseña', ['class' => 'form-control' . ($errors->has('contraseña') ? ' is-invalid' : ''), 'placeholder' => 'Contraseña']) }}
            {!! $errors->first('contraseña', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('codigo_curso') }}
            {{ Form::text('codigo_curso', $usuario->codigo_curso, ['class' => 'form-control' . ($errors->has('codigo_curso') ? ' is-invalid' : ''), 'placeholder' => 'Código Curso']) }}
            {!! $errors->first('codigo_curso', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $usuario->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('fecha_fin') }}
            {{ Form::date('fecha_fin', $usuario->fecha_fin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : '')]) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('aula') }}
            {{ Form::select('aula_id', $aulas, $usuario->aula_id, ['class' => 'form-control' . ($errors->has('aula_id') ? ' is-invalid' : ''), 'placeholder' => 'Selecciona un aula']) }}
            {!! $errors->first('aula_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-3">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
</div>