@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

{{ Form::hidden('user_id',Auth::user()->id) }}

@if(isset($movimiento->expediente_id))
{{ Form::hidden('expediente_id', $movimiento->expediente_id) }}
@else
<div class="form-label-group pb-1">
    {!! Form::select('expediente_id',$expedientes,old('expediente_id'),['class' => 'form-control','placeholder' => 'Expedientes']); !!}
    {{-- <label for="is_active">{{ trans('validation.attributes.is_active') }}</label> --}}
</div>
@endif

@if(isset($movimiento->nivel_id))
{{ Form::hidden('nivel_id', $movimiento->nivel_id) }}
@else

{{-- <div class="form-label-group pb-1">
    {!! Form::select('almacens',$nivels,old('almacens'),['class' => 'form-control','placeholder' => 'Almacenes']); !!}
</div> --}}

<div class="form-label-group pb-1">
    {!! Form::select('nivel_id',$nivels,old('nivel_id'),['class' => 'form-control','placeholder' => 'Niveles']); !!}
    {{-- <label for="is_active">{{ trans('validation.attributes.is_active') }}</label> --}}
</div>
@endif

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


@section('stylesheet')
    @parent

    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css') }}" rel="stylesheet">

@endsection

{{-- @section('scripts')
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

@endsection --}}