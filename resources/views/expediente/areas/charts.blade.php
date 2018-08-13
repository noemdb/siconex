@extends('expediente.layouts.dashboard.app')

@section('main')

    <main role="main" class="col-md-10 ml-sm-auto col-lg-10">


        <div class="card mt-2 bd-callout bd-callout-info">
            <div class="card-header">
                <h3>
                    Gráficas relacionadas a los registros de Movimientos

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">
                        @include('expediente.areas.menus.show')
                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="card-body p-1">

             @include('expediente.areas.chart.body')

            </div>

        </div>

    </main>

@endsection

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