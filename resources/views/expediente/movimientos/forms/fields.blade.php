@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

{{ Form::hidden('user_id',Auth::user()->id) }}

<div class="form-label-group pb-1">

    @if(count($expedientes)>1)

        {!! Form::select('expediente_id',$expedientes,old('expediente_id'),['class' => 'form-control', 'id'=>'expediente_id']); !!}

    @else

        <input type="hidden" name="expediente_id" id="expediente_id" value="{{ $expediente_id or ''}}">
        <div class="alert alert-secondary pb-1 mb-1" role="alert">
            <span class="font-weight-normal p-0 m-0" style="color: #777;">
                Expediente:
            </span> <br>
            <span class="font-weight-bold p-0 m-0" id="spanalmacens">
                {{$expedientes[$expediente_id] or 'error'}}
            </span>
        </div>    
        
    @endif
    
</div>

<div class="form-label-group pb-1">
    
    @if(count($areas)>1)

        {!! Form::select('area_id',$areas,old('area_id'),['class' => 'form-control', 'id'=>'area_id','placeholder' => 'Aréas']); !!}

    @else

        <input type="hidden" name="area_id" id="area_id" value="{{ $area_id or ''}}">
        <div class="alert alert-secondary pb-1 mb-1" role="alert">
            <span class="font-weight-normal p-0 m-0" style="color: #777;">
                Area:
            </span> <br>
            <span class="font-weight-bold p-0 m-0" id="spanalmacens">
                {{$areas[$area_id] or 'error'}}
            </span>
        </div>    
        
    @endif
    
</div>

<div class="form-label-group pb-1">
    {!! Form::select('tipo',$tipos,old('tipo'),['class' => 'form-control','placeholder' => 'Tipo']); !!}
</div>


<div class="form-label-group pb-1">
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control','placeholder'=>'Descripción','id'=>'descripcion','required']); !!}
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