{{-- INI row card --}}
<div class="row">
    <div class="col-lg-6 col-md-6 col-sm-12">

        {{-- INI card-collapse tasks --}}
        @component('elements.widgets.label')
            @slot('class', 'info')
            @slot('iconTitle', $icon_menus['task'].' fa-5x')
            @slot('total', $tasks->where('estado','INICIADA')->count())
            @slot('title', 'Tareas Pendientes')
            @slot('subtitle', 'Últimas 5')
            @slot('headercollapse', 'Mas detalles')
            @slot('id', 'idtareas1')
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
        {{-- INI card-collapse alert --}}
        @component('elements.widgets.panel')
            @slot('class', 'yellow')
            @slot('class_icon', 'fa fa-bell fa-5x')
            @slot('total', $alerts->where('estado','No Visto')->count())
            @slot('text', 'Alertas Pendientes')
            @slot('headercollapse', 'Mas detalles')
            @slot('idcollapse', 'idalertas1')
            @slot('bodycollapse')
                {{-- INI alert-list --}}
                @component('elements.widgets.panel')
                    @slot('badge',$alerts->where('estado','No Visto')->count())
                    @slot('class','warning')
                    @slot('panelTitle', 'Pendientes')
                    @slot('panelBody')
                        @include('elements.widgets.alerts.list',[
                            'alerts'=>$alerts->where('estado','No Visto')->take(5),
                            'show_alert'=>'true'
                            ])
                    @endslot
                @endcomponent
                {{-- FIN alert-list --}}
            @endslot
        @endcomponent
        {{-- INI card-collapse alert --}}
    </div>
    
</div>
{{-- FIN row card --}}