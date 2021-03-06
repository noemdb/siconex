{{-- INI dashboard widget --}}
<div class="container">
    {{-- INI labels --}}

    <div class="row pt-1 mt-1">
        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- INI card-collapse movimientos --}}
            @php ($movimientos_take = $movimientos->where('created_at','>',Carbon\Carbon::now()->subMonth(3))->take(3))
            @component('elements.widgets.label')
                @slot('class', 'success')
                @slot('iconTitle', $icon_menus['movimiento'].' fa-3x')
                @slot('total', $movimientos->count())
                @slot('title', 'Movimientos realizados')
                @slot('subtitle', 'Últimos 3 meses')
                @slot('headercollapse', 'Mas detalles')
                @slot('id', 'idmovimientos_label')
                @slot('panelControls', true)
                @slot('body')
                    @component('expediente.movimientos.widgets.list')
                        @slot('datas',$movimientos_take)
                        @slot('show_content',true)
                        @slot('icon',$icon_menus['movimiento'])
                    @endcomponent
                @endslot
                {{-- @slot('footer') --}}
                {{-- @endslot --}}
            @endcomponent
            {{-- INI card-collapse tasks --}}
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- INI card-collapse expedientes --}}
            @php ($expedientes_take = $expedientes->where('created_at','>',Carbon\Carbon::now()->subMonth(3))->take(8))
            @component('elements.widgets.label')
                @slot('class', 'primary')
                @slot('iconTitle', $icon_menus['expediente'].' fa-3x')
                @slot('total', $expedientes->count())
                @slot('title', 'Expedientes Registrados')
                @slot('subtitle', 'Últimos 3 meses')
                @slot('headercollapse', 'Mas detalles')
                @slot('id', 'idexpedientes_label')
                @slot('panelControls', true)
                @slot('body')
                    @component('expediente.expedientes.widgets.list')
                        @slot('datas',$expedientes_take)
                        @slot('show_content',true)
                        @slot('icon',$icon_menus['expediente'])
                    @endcomponent
                @endslot
                {{-- @slot('footer') --}}
                {{-- @endslot --}}
            @endcomponent
            {{-- INI card-collapse expedientes --}}
        </div>

    </div>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- INI card-collapse tasks --}}
            @component('elements.widgets.label')
                @slot('class', 'info')
                @slot('iconTitle', $icon_menus['task'].' fa-3x')
                @slot('total', $tasks->where('estado','INICIADA')->count())
                @slot('title', 'Tareas Pendientes')
                @slot('subtitle', 'Últimas 5')
                @slot('headercollapse', 'Mas detalles')
                @slot('id', 'idtareas_label')
                @slot('panelControls', true)
                @slot('body')
                    @include('elements.widgets.tasks.list',[
                        'tasks'=>$tasks->where('estado','INICIADA')->take(5),
                        'show_task'=>'true'
                        ])
                @endslot

                {{-- @slot('footer') --}}
                {{-- @endslot --}}

            @endcomponent
            {{-- INI card-collapse tasks --}}
        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">
            {{-- INI card-collapse tasks --}}
            @component('elements.widgets.label')
                @slot('class', 'danger')
                @slot('iconTitle', $icon_menus['alert'].' fa-3x')
                @slot('total', $alerts->where('estado','Enviada')->count())
                @slot('title', 'Alertas Enviadas')
                @slot('subtitle', 'Últimas 5')
                @slot('headercollapse', 'Mas detalles')
                @slot('id', 'idalerts_label')
                @slot('panelControls', true)
                @slot('body')
                    @include('elements.widgets.alerts.list',[
                        'alerts'=>$alerts->where('estado','Enviada')->take(5),
                        'show_alert'=>'true'
                        ])
                @endslot

                {{-- @slot('footer') --}}
                {{-- @endslot --}}

            @endcomponent
            {{-- INI card-collapse tasks --}}
        </div>

    </div>


    {{-- FIN labels --}}
</div>
{{-- FIN dashboard widget --}}