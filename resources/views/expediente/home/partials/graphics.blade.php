{{-- INI dashboard widget --}}
<div class="container">
    {{-- INI graphics --}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- <div class="card mt-2 bd-callout bd-callout-info"> --}}

               @include('expediente.expedientes.chart.expedientesmonths')

            {{-- </div> --}}

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- <div class="card mt-2 bd-callout bd-callout-info"> --}}

               @include('expediente.estudiantes.chart.estudiantesestados')

            {{-- </div> --}}

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- <div class="card mt-2 bd-callout bd-callout-info"> --}}

               @include('expediente.movimientos.chart.movimientosmonthsline')

            {{-- </div> --}}

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- <div class="card mt-2 bd-callout bd-callout-info"> --}}

               @include('expediente.movimientos.chart.movimientosusers')

            {{-- </div> --}}

        </div>

    </div>
    {{-- FIN graphics --}}
</div>
{{-- FIN dashboard widget --}}

@section('scripts')
    @parent
    {{-- <script src="{{ asset("js/Chart.js") }}"></script> --}}
    <script src="{{ asset("js/Chart.bundle.js") }}"></script>
    {{-- <script src="{{ asset("js/utils.js") }}"></script> --}}
    <script src="{{ asset("js/ChartFunction.js") }}"></script>{{-- Funciones para generar los Chart --}}

    {{-- INI Evento clic para generar los Chart por rango--}}
    <script src="{{ asset("js/ChartEvent.js") }}"></script>{{-- Funciones para generar los Chart --}}
    {{-- FIN Evento clic para generar los Chart por rango --}}

@endsection