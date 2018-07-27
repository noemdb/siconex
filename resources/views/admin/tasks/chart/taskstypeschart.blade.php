@php ($chart = ['range'=>'Todos','id_chart'=>'taskstypeschart','urlapi'=>route('tasks.types.chart'),'tipo'=>'line','limit'=>6 ])
@section('scripts')
    @parent
    {{-- Llamado a la funcion responsable de inicilizar el Chart --}}
    <script> requestData('{{ $chart['range'] }}','{{ $chart['id_chart'] }}','{{ $chart['urlapi'] }}','{{ $chart['tipo'] }}','{{ $chart['limit'] }}'); </script>
@endsection

@component('admin.elements.card.panel')
    @slot('class', 'success')
    @slot('panelControls', 'true')
    @slot('id', $chart['id_chart'])
    @slot('header', 'Tareas por Tipo')
    @slot('iconTitle', $icon_menus['chartline'])
    @slot('body')
        @component('admin.elements.canvas.chart')
            @slot('class', 'borderRBL')                  
            @slot('nav') 
                <nav class="nav nav-tabs ranges" id="nav-tab" role="tablist" data-canvas="{{ $chart['id_chart'] or ''}}" data-urlapi="{{ $chart['urlapi'] or ''}}" data-tipo="{{ $chart['tipo'] or ''}}" data-limit="{{ $chart['limit'] or ''}}">
                  <a data-range="Todos" class="nav-item nav-link active" id="nav-todos-tab" data-toggle="tab" href="#nav-todos" role="tab" aria-controls="nav-todos" aria-selected="false">Todos</a>
                  <a data-range="365" class="nav-item nav-link" id="nav-365-tab" data-toggle="tab" href="#nav-365" role="tab" aria-controls="nav-365" aria-selected="false">365D</a>
                  <a data-range="90" class="nav-item nav-link" id="nav-90-tab" data-toggle="tab" href="#nav-90" role="tab" aria-controls="nav-90" aria-selected="false">90D</a>
                  <a data-range="30" class="nav-item nav-link" id="nav-30-tab" data-toggle="tab" href="#nav-30" role="tab" aria-controls="nav-30" aria-selected="false">30D</a>
                  <a data-range="7" class="nav-item nav-link" id="nav-7-tab" data-toggle="tab" href="#nav-7" role="tab" aria-controls="nav-7" aria-selected="false">7D</a>
                </nav> 
            @endslot
            @slot('id', $chart['id_chart'])                  
        @endcomponent
    @endslot
@endcomponent