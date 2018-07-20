@include('admin.elements.forms.errors')

@include('admin.elements.messeges.oper_ok')

<div class="form-label-group pb-1">

    {!! Form::select('task',$task_list,old('task'),['class' => 'form-conttask','placeholder' => 'Tarea']); !!}
    {{-- <label for="task">{{ trans('validation.attributes.task') }}</label> --}}

</div>

<div class="form-label-group pb-1">

    {!! Form::select('rango',$rango_list,old('rango'),['class' => 'form-conttask','placeholder' => 'Rango']); !!}
    {{-- <label for="rango">{{ trans('validation.attributes.rango') }}</label> --}}

</div>

<div class="form-label-group pb-1">
    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-conttask','placeholder'=>'descripcion','id'=>'descripcion','required']); !!}
    {{-- <input type="text" id="username" name="username" class="form-conttask{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}"> --}}
    <label for="descripcion">Descripción</label>

</div>

<div class="form-label-group pb-1">
        {!! Form::text('finicial', old('finicial'), ['class' => 'form-conttask datepicker','placeholder'=>'Fecha Inicial','id'=>'finicial','required','readonly','maxlength'=>"10"]); !!}
    <label for="finicial">Fecha Inicial</label>
</div>

<div class="form-label-group pb-1">
    {!! Form::text('ffinal', old('ffinal'), ['class' => 'form-conttask datepicker','placeholder'=>'Fecha Final','id'=>'ffinal','required','readonly','maxlength'=>"10"]); !!}
    <label for="ffinal">Fecha Final</label>
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