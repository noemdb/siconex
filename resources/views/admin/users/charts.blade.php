@extends('admin.layouts.dashboard.app')

@section('main')

    <main role="main" class="col-md-10 ml-sm-auto col-lg-10">

      @component('admin.elements.card.panel')
          @slot('class', 'info')
          @slot('panelControls', 'true')
          @slot('id', 'id_chart' )
          @slot('header', 'Usuarios Act/Des')
          @slot('iconTitle', 'fas fa-chart-pie')
          @slot('body')
              @component('admin.elements.canvas.chart')
                  @slot('class', 'borderRBL')
                  @slot('nav')                      
                      <nav class="nav nav-tabs range" id="nav-tab" role="tablist" data-canvas="{{ $chart['id_chart'] or ''}}" data-urlapi="{{ $chart['urlapi'] or ''}}" data-tipo="{{ $chart['tipo'] or ''}}" data-limit="{{ $chart['limit'] or ''}}">
                        <a data-range="Todos" class="nav-item nav-link active" id="nav-todos-tab" data-toggle="tab" href="#nav-todos" role="tab" aria-controls="nav-todos" aria-selected="false">Todos</a>
                        <a data-range="365" class="nav-item nav-link" id="nav-365-tab" data-toggle="tab" href="#nav-365" role="tab" aria-controls="nav-365" aria-selected="false">365D</a>
                        <a data-range="90" class="nav-item nav-link" id="nav-90-tab" data-toggle="tab" href="#nav-90" role="tab" aria-controls="nav-90" aria-selected="false">90D</a>
                        <a data-range="30" class="nav-item nav-link" id="nav-30-tab" data-toggle="tab" href="#nav-30" role="tab" aria-controls="nav-30" aria-selected="false">30D</a>
                        <a data-range="7" class="nav-item nav-link" id="nav-7-tab" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7" aria-selected="false">7D</a>
                      </nav>
                  @endslot
                  @slot('id', 'id_chart')
              @endcomponent
          @endslot
      @endcomponent

    </main>

@endsection

@section('scripts')
    @parent
    <script src="{{ asset("js/Chart.js") }}"></script>
    {{-- <script src="{{ asset("js/utils.js") }}"></script> --}}
    <script src="{{ asset("js/ChartFunction.js") }}"></script>{{-- Funciones para generar los Chart --}}

    {{-- INI funciones para generar los Chart --}}
    <script>
 
        //Evento clic para el panel de tab nav-tabs (menu con las opciones)
        $('nav.ranges a').click(function(e){
            e.preventDefault();
            // Get the number of range from the data attribute
            var el = $(this);
            var range = $(this).data('range'); alert('123');
            var nav = $(this).parents('nav');
            var canvas = nav.data('canvas'); //alert(canvas);
            var api = nav.data('urlapi'); //alert(urlapi);
            var tipo = nav.data('tipo'); //alert(tipo);
            var limit = nav.data('limit'); //alert(limit);

            // Request the data and render the chart using our handy function
            requestData(range,canvas,api,tipo,limit);
            // Make things pretty to show which button/tab the user clicked
            el.parent().addClass('active');
            el.parent().siblings().removeClass('active');

        });

    </script>
    {{-- FIN funciones para generar los Chart --}}

@endsection