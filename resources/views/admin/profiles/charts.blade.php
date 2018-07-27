@extends('admin.layouts.dashboard.app')

@section('main')

    <main role="main" class="col-md-10 ml-sm-auto col-lg-10">

      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">

            @php ($chart = ['range'=>'Todos','id_chart'=>'profilesmonthchart','urlapi'=>route('profiles.month.chart'),'tipo'=>'line','limit'=>6 ])
            @section('scripts')
                @parent
                {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
            @endsection

            @component('admin.elements.card.panel')
                @slot('class', 'info')
                @slot('panelControls', 'true')
                @slot('id', $chart['id_chart'])
                {{-- @slot('header', 'Usuarios Act/Des') --}}
                @slot('header', 'Reg. Perfiles por Mes')
                @slot('iconTitle', 'fas fa-chart-pie')
                @slot('body')
                    @component('admin.elements.canvas.chart')
                        @slot('class', 'borderRBL')                  
                        @slot('nav')                      
                            <nav class="nav nav-tabs ranges" id="nav-tab" role="tablist" data-canvas="{{ $chart['id_chart'] or ''}}" data-urlapi="{{ $chart['urlapi'] or ''}}" data-tipo="{{ $chart['tipo'] or ''}}" data-limit="{{ $chart['limit'] or ''}}">
                              <a data-range="Todos" class="nav-item nav-link active" id="nav-todos-tab" data-toggle="tab" href="#nav-todos" role="tab" aria-controls="nav-todos" aria-selected="false">Todos</a>
                              <a data-range="12" class="nav-item nav-link" id="nav-365-tab" data-toggle="tab" href="#nav-12" role="tab" aria-controls="nav-12" aria-selected="false">12M</a>
                              <a data-range="9" class="nav-item nav-link" id="nav-90-tab" data-toggle="tab" href="#nav-9" role="tab" aria-controls="nav-9" aria-selected="false">9M</a>
                              <a data-range="6" class="nav-item nav-link" id="nav-30-tab" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6" aria-selected="false">6M</a>
                              <a data-range="3" class="nav-item nav-link" id="nav-7-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">3M</a>
                            </nav>
                        @endslot
                        @slot('id', $chart['id_chart'])                  
                    @endcomponent
                @endslot
            @endcomponent
          
        </div>
        
        <div class="col-lg-6 col-md-6 col-sm-12">

            @php ($chart = ['range'=>'Todos','id_chart'=>'ProfilesUsers','urlapi'=>route('profiles.users.chart'),'tipo'=>'pie','limit'=>6 ])
            @section('scripts')
                @parent
                {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
                <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
            @endsection

            @component('admin.elements.card.panel')
                @slot('class', 'info')
                @slot('panelControls', 'true')
                @slot('id', $chart['id_chart'])
                @slot('header', 'Usuarios y Perfiles')
                @slot('iconTitle', 'fas fa-chart-pie')
                @slot('body')
                    @component('admin.elements.canvas.chart')
                        @slot('class', 'borderRBL')                  
                        @slot('nav')                      
                            {{-- <nav class="nav nav-tabs ranges" id="nav-tab" role="tablist" data-canvas="{{ $chart['id_chart'] or ''}}" data-urlapi="{{ $chart['urlapi'] or ''}}" data-tipo="{{ $chart['tipo'] or ''}}" data-limit="{{ $chart['limit'] or ''}}">
                              <a data-range="Todos" class="nav-item nav-link active" id="nav-todos-tab" data-toggle="tab" href="#nav-todos" role="tab" aria-controls="nav-todos" aria-selected="false">Todos</a>
                              <a data-range="365" class="nav-item nav-link" id="nav-365-tab" data-toggle="tab" href="#nav-365" role="tab" aria-controls="nav-365" aria-selected="false">365D</a>
                              <a data-range="90" class="nav-item nav-link" id="nav-90-tab" data-toggle="tab" href="#nav-90" role="tab" aria-controls="nav-90" aria-selected="false">90D</a>
                              <a data-range="30" class="nav-item nav-link" id="nav-30-tab" data-toggle="tab" href="#nav-30" role="tab" aria-controls="nav-30" aria-selected="false">30D</a>
                              <a data-range="7" class="nav-item nav-link" id="nav-7-tab" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7" aria-selected="false">7D</a>
                            </nav> --}}
                        @endslot
                        @slot('id', $chart['id_chart'])                  
                    @endcomponent
                @endslot
            @endcomponent

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

    {{-- INI funciones para generar los Chart --}}
    <script>
 
        //Evento clic para el panel de tab nav-tabs (menu con las opciones)
        $('nav.ranges a').click(function(e){
            e.preventDefault();
            // alert('123');
            // Get the number of range from the data attribute
            var el = $(this);
            var range = $(this).data('range'); console.log('Entro a la funcion');
            var nav = $(this).parents('nav'); console.log('nav: '+nav);
            var canvas = nav.data('canvas'); console.log('canvas: '+canvas);
            var api = nav.data('urlapi'); console.log('urlapi: '+api);
            var tipo = nav.data('tipo'); console.log('tipo: '+tipo);
            var limit = nav.data('limit'); console.log('limit: '+limit);

            // Request the data and render the chart using our handy function
            requestData(range,canvas,api,tipo,limit);
            // Make things pretty to show which button/tab the user clicked
            el.parent().addClass('active');
            el.parent().siblings().removeClass('active');

        });

    </script>
    {{-- FIN funciones para generar los Chart --}}

@endsection