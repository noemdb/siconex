@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

{{ Form::hidden('user_id',Auth::user()->id) }}

@if(isset($estudiante->id))
    {{ Form::hidden('estudiante_id', $estudiante->id) }}
@else
    <div class="form-label-group pb-1">
        {!! Form::select('estudiante_id',$estudiantes,old('estudiante_id'),['class' => 'form-control','placeholder' => 'Estudiante', 'id'=>'estudiante_id']); !!}
    </div>
@endif

<input type="hidden" name="codigo" id="codigo" value="{{ $expediente->codigo or ''}}">
<div class="alert alert-secondary pb-1 mb-1" role="alert">
    <span class="font-weight-normal p-0 m-0" style="color: #777;">
        Código:
    </span> <br>
    <span class="font-weight-bold p-0 m-0" id="spancodigo">
        {{ $expediente->codigo or 'Seleccione Estudiante'}}
    </span>
</div>


{{-- <div class="form-label-group pb-1">
    {!! Form::text('codigo', old('codigo'), ['class' => 'form-control','placeholder'=>'Código','id'=>'codigo', 'readonly'=>'readonly']); !!}
    <label for="codigo">Código</label>
</div> --}}

<div class="form-label-group pb-1">
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control','placeholder'=>'descripcion','id'=>'descripcion']); !!}
    <label for="descripcion">Descripción</label>
</div>

<div class="form-label-group pb-1">
    {!! Form::text('observacion', old('observacion'), ['class' => 'form-control','placeholder'=>'Observación','id'=>'observacion']); !!}
    <label for="observacion">Observación</label>
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
                $("#estudiante_id").change(function(){
                    var lastValue = $('#estudiante_id option:last-child').val();
                    var dt = new Date();
                    var pre = dt.getMonth()+''+dt.getUTCDate()+''+dt.getSeconds();
                    var codigo = pre+''+$("#estudiante_id option:selected").text()+''+lastValue;

                    // var currentYear = (new Date).getFullYear();
                    // var codigo = currentYear+'.'+$("#estudiante_id option:selected").text();
                    $('#codigo').val(codigo);
                    $('#spancodigo').text(codigo);
                    // console.log($('#codigo').val());
                });
        });
    </script>

@endsection