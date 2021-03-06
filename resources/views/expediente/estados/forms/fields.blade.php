@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

<div class="form-label-group pb-1">
    @if(count($estudiantes)>1)

        {!! Form::select('estudiante_id',$estudiantes,old('estudiante_id'),['class' => 'form-control', 'id'=>'estudiante_id']); !!}

    @else

        <input type="hidden" name="estudiante_id" id="estudiante_id" value="{{ $estudiante_id or ''}}">
        <div class="alert alert-secondary pb-1 mb-1" role="alert">
            <span class="font-weight-normal p-0 m-0" style="color: #777;">
                Estudiante:
            </span> <br>
            <span class="font-weight-bold p-0 m-0" id="spanalmacens">
                {{$estudiantes[$estudiante_id] or 'error'}}
                {{-- [{{$estudiantes[$estudiante_id] or 'error'}}] --}}
            </span>
        </div>    
        
    @endif
    
</div>

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