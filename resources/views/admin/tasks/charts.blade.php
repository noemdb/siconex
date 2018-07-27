@extends('admin.layouts.dashboard.app')

@section('main')

    <main role="main" class="col-md-10 ml-sm-auto col-lg-10">

        {{-- ini tab --}}
        <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-tab01-tab" data-toggle="tab" href="#nav-tab01" role="tab" aria-controls="nav-tab01" aria-selected="true">Gráficas 1</a>
            <a class="nav-item nav-link" id="nav-tab02-tab" data-toggle="tab" href="#nav-tab02" role="tab" aria-controls="nav-tab02" aria-selected="false">Gráficas 2</a>
          </div>
        </nav>
        
        <div class="tab-content" id="nav-tabContent">
          {{-- ini tab01 --}}
          <div class="tab-pane fade show active" id="nav-tab01" role="tabpanel" aria-labelledby="nav-tab01-tab">
              
              <div class="row">
                
                <div class="col-lg-6 col-md-6 col-sm-12">

                    @include('admin.tasks.chart.tasksmonthchart')
                  
                </div>

                <div class="col-lg-6 col-md-6 col-sm-12">

                    @include('admin.tasks.chart.tasksuserschart')

                </div>

              </div>   
                 
          </div>
          {{-- fin tab01 --}}

          {{-- ini tab02 --}}
          <div class="tab-pane fade" id="nav-tab02" role="tabpanel" aria-labelledby="nav-tab02-tab">

              <div class="row">
                
                <div class="col-lg-6 col-md-6 col-sm-12">

                    @include('admin.tasks.chart.taskstypeschart')
                  
                </div>

                {{-- <div class="col-lg-6 col-md-6 col-sm-12"> --}}

                    {{-- @include('admin.rols.chart.rolsrangeschart') --}}

                {{-- </div> --}}

              </div>

          </div>
          {{-- fin tab02 --}}
        </div>
        {{-- fin tab --}}

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
            var range = $(this).data('range'); //console.log('Entro a la funcion');
            var nav = $(this).parents('nav'); //console.log('nav: '+nav);
            var canvas = nav.data('canvas'); //console.log('canvas: '+canvas);
            var api = nav.data('urlapi'); //console.log('urlapi: '+api);
            var tipo = nav.data('tipo'); //console.log('tipo: '+tipo);
            var limit = nav.data('limit'); //console.log('limit: '+limit);

            // Request the data and render the chart using our handy function
            requestData(range,canvas,api,tipo,limit);
            // Make things pretty to show which button/tab the user clicked
            el.parent().addClass('active');
            el.parent().siblings().removeClass('active');

        });

    </script>
    {{-- FIN funciones para generar los Chart --}}

@endsection