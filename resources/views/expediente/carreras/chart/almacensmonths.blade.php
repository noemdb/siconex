@php ($chart = ['range'=>'Todos','id_chart'=>'almacensmonthschart','urlapi'=>route('carreras.months.chart'),'tipo'=>'line','limit'=>6 ])
@section('scripts')
    @parent
    {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
    <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
@endsection

@component('expediente.elements.card.panel')
    @slot('class', 'info')
    @slot('panelControls', 'true')
    @slot('id', $chart['id_chart'])
    @slot('header', 'Reg. Carreras por Mes')
    @slot('iconTitle', $icon_menus['chartline'])
    @slot('body')
        @component('expediente.elements.chart.canvas')
            @slot('class', 'borderRBL')                  
            @slot('nav')
              @component('expediente.elements.chart.navyear')
                @slot('id_chart', $chart['id_chart'])
                @slot('urlapi', $chart['urlapi'])
                @slot('tipo', $chart['tipo'])
                @slot('limit', $chart['limit'])
              @endcomponent
            @endslot
            @slot('id', $chart['id_chart'])                  
        @endcomponent
    @endslot
@endcomponent