@php ($chart = ['range'=>'Todos','id_chart'=>'documentostiposchart','urlapi'=>route('movimientos.tipos.chart'),'tipo'=>'bar','limit'=>6, 'legend'=>false ])
@section('scripts')
    @parent
    {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
    <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}','{{ $chart['legend'] }}'); </script>
@endsection

@component('admin.elements.card.panel')
    @slot('class', 'success')
    @slot('panelControls', 'true')
    @slot('id', $chart['id_chart'])
    @slot('header', 'Movimientos por Tipo')
    @slot('iconTitle', $icon_menus['chartbar'])
    @slot('body')
        @component('admin.elements.canvas.chart')
            @slot('class', 'borderRBL')
            @slot('nav')
                @component('expediente.elements.chart.navday')
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