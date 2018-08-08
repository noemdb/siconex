@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

@if(isset($estudiante->id))
{{ Form::hidden('estudiante_id', $estudiante->id) }}
@else
<div class="form-label-group pb-1">
    {!! Form::select('estudiante_id',$estudiantes,old('estudiante_id'),['class' => 'form-control','placeholder' => 'Estudiante']); !!}
    {{-- <label for="is_active">{{ trans('validation.attributes.is_active') }}</label> --}}
</div>
@endif

<div class="form-label-group pb-1">

    {!! Form::select('nombre',$carreras,old('nombre'),['class' => 'form-control','placeholder' => 'Carrera']); !!}
    {{-- <label for="rango">{{ trans('validation.attributes.rango') }}</label> --}}

</div>

<div class="form-label-group pb-1">

    {!! Form::select('padminsion',['1'=>'1','2'=>'2'],old('padminsion'),['class' => 'form-control','placeholder' => 'Lapso Admisión']); !!}
    {{-- <label for="rango">{{ trans('validation.attributes.rango') }}</label> --}}

</div>

<div class="row">
    <div class="col">
        <div class="form-label-group pb-1">
            {!! Form::text('fingreso', old('fingreso'), ['class' => 'form-control datepicker','placeholder'=>'Fecha Ingreso','id'=>'fingreso','required','readonly','maxlength'=>"10"]); !!}
            <label for="fingreso">Fecha de Ingreso</label>
        </div>
    </div>
    <div class="col">
        <div class="form-label-group pb-1">
            {!! Form::text('fegreso', old('fegreso'), ['class' => 'form-control datepicker','placeholder'=>'Fecha Egreso','id'=>'fegreso','readonly','maxlength'=>"10"]); !!}
            <label for="fegreso">Fecha Egreso</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col">
        <div class="form-label-group pb-1">
            {!! Form::text('fcongelar', old('fcongelar'), ['class' => 'form-control datepicker','placeholder'=>'Fecha Congelar','id'=>'fcongelar','readonly','maxlength'=>"10"]); !!}
            <label for="fcongelar">Fecha de Congelar</label>
        </div>
    </div>
    <div class="col">
        <div class="form-label-group pb-1">
            {!! Form::text('fdescongelar', old('fdescongelar'), ['class' => 'form-control datepicker','placeholder'=>'Fecha Descongelar','id'=>'fdescongelar','readonly','maxlength'=>"10"]); !!}
            <label for="fdescongelar">Fecha Descongelar</label>
        </div>
    </div>
</div>

@section('stylesheet')
    @parent

    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css') }}" rel="stylesheet">

@endsection

@section('scripts')
    @parent

    <script src="{{ asset("vendor/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js") }}"></script>
    <script src="{{asset('vendor/bootstrap-datepicker/1.6.4/locales/bootstrap-datepicker.es.min.js')}}"></script>

    <script type="text/javascript">

        $('.datepicker').datepicker({
            format: "yyyy-mm-dd",
            language: "es",
            autoclose: true,
            startView: 2
        });

    </script>

@endsection