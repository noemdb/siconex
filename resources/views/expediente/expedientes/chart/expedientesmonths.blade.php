@php ($chart = ['range'=>'Todos','id_chart'=>'expedientesmonthschart','urlapi'=>route('expedientes.months.chart'),'tipo'=>'bar','limit'=>8, 'legend'=>false ])
@section('scripts')
    @parent
    {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
     <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}','{{ $chart['legend'] }}'); </script>
@endsection

@component('expediente.elements.card.panel')
    @slot('class', 'info')
    @slot('panelControls', 'true')
    @slot('id', $chart['id_chart'])
    @slot('header', 'Reg. Expedientes por Mes')
    @slot('subtitle', 'Registro de los Expedientes Estudiantiles por mes')
    @slot('iconTitle', $icon_menus['chartline'])
    @slot('body')
        @component('expediente.elements.canvas.chart')
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