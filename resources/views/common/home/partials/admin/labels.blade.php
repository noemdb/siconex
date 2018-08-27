{{-- INI dashboard widget --}}
<div class="container">
    {{-- INI labels --}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 p-1">
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

        <div class="col-lg-6 col-md-6 col-sm-12 p-1">
            {{-- INI card-collapse alerts --}}
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
            {{-- INI card-collapse alerts --}}
        </div>

    </div>
    {{-- FIN labels --}}
</div>
{{-- FIN dashboard widget --}}