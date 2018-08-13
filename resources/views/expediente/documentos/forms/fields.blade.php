@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

@if(isset($documento->expediente_id))
    {{ Form::hidden('expediente_id', $documento->expediente_id) }}
    <div class="alert alert-secondary pb-1 mb-1 font-weight-bold" role="alert">
        <font>Expediente:</font> {{ $documento->expediente->codigo or ''}}
    </div>
@else
    <div class="form-label-group pb-1">
        {!! Form::select('expediente_id',$expedientes,old('expediente_id'),['class' => 'form-control','placeholder' => 'Expedientes']); !!}
        {{-- <label for="is_active">{{ trans('validation.attributes.is_active') }}</label> --}}
    </div>
@endif


<div class="form-label-group pb-1">

    {!! Form::select('tipo',$tipos,old('tipo'),['class' => 'form-control','placeholder' => 'Tipo']); !!}
    {{-- <label for="rango">{{ trans('validation.attributes.rango') }}</label> --}}

</div>

<div class="form-label-group pb-1">
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control','placeholder'=>'descripcion','id'=>'descripcion','required']); !!}
    {{-- <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}"> --}}
    <label for="descripcion">Descripción</label>

</div>

<div class="form-label-group pb-1">
    {!! Form::text('observacion', old('observacion'), ['class' => 'form-control','placeholder'=>'Observación','id'=>'observacion']); !!}
    {{-- <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}"> --}}
    <label for="observacion">Observación</label>

</div>

<div class="form-label-group pb-1">

    {!! Form::select('original',['SI'=>'SI','NO'=>'NO'],old('original'),['class' => 'form-control','placeholder' => 'Original']); !!}
    {{-- <label for="rango">{{ trans('validation.attributes.rango') }}</label> --}}

</div>

<div class="form-label-group pb-1">

    {!! Form::select('copia',['SI'=>'SI','NO'=>'NO'],old('copia'),['class' => 'form-control','placeholder' => 'Copia']); !!}
    {{-- <label for="rango">{{ trans('validation.attributes.rango') }}</label> --}}

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