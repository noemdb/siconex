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

    {!! Form::select('estado',$estados,old('estado'),['class' => 'form-control','placeholder' => 'Estado']); !!}
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