<div class="box box-info padding-1 custom-box-body">
    <div class="box-body ">
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('Identificador') }}
            {{ Form::text('Identificador', $ordenadore->Identificador, ['class' => 'form-control' . ($errors->has('Identificador') ? ' es-invalido' : ''), 'placeholder' => 'Identificador']) }}
            {!! $errors->first('Identificador', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('marca') }}
            {{ Form::text('marca', $ordenadore->marca, ['class' => 'form-control' . ($errors->has('marca') ? ' es-invalido' : ''), 'placeholder' => 'Marca']) }}
            {!! $errors->first('marca', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('modelo') }}
            {{ Form::text('modelo', $ordenadore->modelo, ['class' => 'form-control' . ($errors->has('modelo') ? ' es-invalido' : ''), 'placeholder' => 'Modelo']) }}
            {!! $errors->first('modelo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('descripcion') }}
            {{ Form::textarea('descripcion', $ordenadore->descripcion, ['class' => 'form-control' . ($errors->has('descripcion') ? ' es-invalido' : ''),'rows' => '2', 'placeholder' => 'Descripcion']) }}
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem">
            {{ Form::label('ip') }}
            {{ Form::text('ip', $ordenadore->ip, ['class' => 'form-control' . ($errors->has('ip') ? ' es-invalido' : ''), 'placeholder' => 'Ip']) }}
            {!! $errors->first('ip', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group" style="width: 20rem" >
            {{ Form::label('fecha_compra') }}
            <div class="input-group date">
                {{ Form::text('fecha_compra', $ordenadore->fecha_compra, ['type' =>'text','id' => 'fecha_compra', 'class' => 'form-control' . ($errors->has('fecha_compra') ? ' es-invalido' : ''), 'placeholder' => 'Fecha Compra']) }}
                <span class="input-group-append">
                    <span class="input-group-text bg-light d-block">
                        <i class="far fa-calendar fa-lg"></i>
                    </span>
                  </span>
            </div>
            {!! $errors->first('fecha_compra', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group" style="width: 20rem">
            {{ Form::label('aula_id') }}
            {{ Form::select('aula_id',$aulas, $ordenadore->aula_id, ['class' => 'form-control' . ($errors->has('aula_id') ? ' es-invalido' : ''), 'placeholder' => 'Nombre del Aula']) }}
            {!! $errors->first('aula_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt-4">
        <button type="submit" class="btn btn-primary">{{ __('Enviar') }}</button>
    </div>
    
   
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
    
</div>