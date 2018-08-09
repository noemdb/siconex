@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

@if(isset($nivel->almacen_id))
    {{ Form::hidden('almacen_id', $nivel->almacen_id) }}
    <div class="form-label-group pb-1">
        {!! Form::text('almacen_name', $nivel->almacen->nombre, ['readonly'=>'readonly','class' => 'form-control','placeholder'=>'Nivel','id'=>'almacen_name']); !!}
        <label for="almacen_name">Almacen</label>
    </div>
@else
    <div class="form-label-group pb-1">
        {!! Form::select('almacen_id',$almacens,old('almacen_id'),['class' => 'form-control','placeholder' => 'Almacen', 'id'=>'almacen_id']); !!}
        {{-- <label for="is_active">{{ trans('validation.attributes.is_active') }}</label> --}}
    </div>
@endif

<div class="form-label-group pb-1">
    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control','placeholder'=>'Código','id'=>'codigo', 'readonly'=>'readonly']); !!}
    <label for="codigo">Código</label>
</div>

<div class="form-label-group pb-1">
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control','placeholder'=>'Descripción','id'=>'descripcion','required']); !!}
    <label for="descripcion">Descripción</label>
</div>

{{-- {{$almacens or ''}}
@php ($almacens = json_decode($almacens))
{{$almacens or ''}}
{{end($almacens) or ''}} --}}

@section('stylesheet')
    @parent

    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css') }}" rel="stylesheet">

@endsection

@section('scripts')
    @parent

    <script type="text/javascript">
        $(document).ready(function(){
                $("#almacen_id").change(function(){
                    var lastValue = $('#almacen_id option:last-child').val();
                    var dt = new Date();
                    var pre = dt.getMonth()+''+dt.getUTCDate()+''+dt.getSeconds();
                    var codigo = pre+''+$("#almacen_id option:selected").text()+''+lastValue;
                    $('#codigo').val(codigo);
                    console.log($('#codigo').val());
                });
        });
    </script>

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