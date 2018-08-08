@php ($chart = ['range'=>'Todos','id_chart'=>'carrerasestudschart','urlapi'=>route('carreras.estuds.chart'),'tipo'=>'bar','limit'=>8, 'legend'=>false ])
@section('scripts')
    @parent
    {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
    <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}','{{ $chart['legend'] }}'); </script>
@endsection

@component('admin.elements.card.panel')
    @slot('class', 'primary')
    @slot('panelControls', 'true')
    @slot('id', $chart['id_chart'])
    @slot('header', 'Estudiantes por Carreras')
    @slot('iconTitle', $icon_menus['chartpie'])
    @slot('body')
        @component('expediente.elements.chart.canvas')
            @slot('class', 'borderRBL')
            @slot('nav')
              @component('expediente.elements.chart.navyear')
                @slot('id_chart', $chart['id_chart'])
                @slot('urlapi', $chart['urlapi'])
                @slot('tipo', $chart['tipo'])
                @slot('limit', $chart['limit'])
                @slot('legend', $chart['legend'])
              @endcomponent
            @endslot
            @slot('id', $chart['id_chart'])
        @endcomponent
    @endslot
@endcomponent

@section('scripts')
    @parent
    {{-- <script type="text/javascript"> Chart.defaults.global.legend.display = false; </script> --}}

@endsection