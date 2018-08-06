@php ($chart = ['range'=>'Todos','id_chart'=>'almacensdocschart','urlapi'=>route('almacens.docs.chart'),'tipo'=>'pie','limit'=>8 ])
@section('scripts')
    @parent
    {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
    <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
@endsection

@component('admin.elements.card.panel')
    @slot('class', 'primary')
    @slot('panelControls', 'true')
    @slot('id', $chart['id_chart'])
    @slot('header', 'Documentos por Almacen')
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