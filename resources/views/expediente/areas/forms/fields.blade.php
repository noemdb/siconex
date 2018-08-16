@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

<div class="form-label-group pb-1">
    @if(count($almacens)>1)

        {!! Form::select('almacen_id',$almacens,old('almacen_id'),['class' => 'form-control', 'id'=>'almacen_id']); !!}

    @else

        <input type="hidden" name="almacen_id" id="almacen_id" value="{{ $almacen_id or ''}}">
        <div class="alert alert-secondary pb-1 mb-1" role="alert">
            <span class="font-weight-normal p-0 m-0" style="color: #777;">
                Almacen:
            </span> <br>
            <span class="font-weight-bold p-0 m-0" id="spanalmacens">
                {{$almacens[$almacen_id] or 'error'}}
            </span>
        </div>    
        
    @endif
    
</div>

<input type="hidden" name="codigo" id="codigo" value="{{ $area->codigo or ''}}">
<div class="alert alert-secondary pb-1 mb-1" role="alert">
    <span class="font-weight-normal p-0 m-0" style="color: #777;">
        Código:
    </span> <br>
    <span class="font-weight-bold p-0 m-0" id="spancodigo">
        {{ $area->codigo or 'Seleccione Almacen'}}
    </span>
</div>

{{-- <div class="form-label-group pb-1">
    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control','placeholder'=>'Código','id'=>'codigo', 'readonly'=>'readonly']); !!}
    <label for="codigo">Código</label>
</div> --}}

<div class="form-label-group pb-1">
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control','placeholder'=>'Descripción','id'=>'descripcion','required']); !!}
    <label for="descripcion">Descripción</label>
</div>

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
                    $('#spancodigo').text(codigo);
                    // console.log($('#codigo').val());
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