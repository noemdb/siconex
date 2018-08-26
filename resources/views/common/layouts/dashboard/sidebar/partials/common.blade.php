{{-- INI Tareas --}}
@component('common.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Tareas')
    @slot('nrcreate', 'tasks.create')
    @slot('nrcrud', 'tasks.index')
    {{-- @slot('nrchart', 'tasks.chart') --}}
    @slot('icon', $icon_menus['task'])
@endcomponent
{{-- FIN Tareas --}}

{{-- INI Alertas --}}
@component('common.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Alertas')
    @slot('nrcreate', 'alerts.create')
    @slot('nrcrud', 'alerts.index')
    {{-- @slot('nrchart', 'alerts.chart') --}}
    @slot('icon', $icon_menus['alert'])
@endcomponent
{{-- FIN Alertas --}}

{{-- INI Mensajes --}}
{{-- @component('common.layouts.dashboard.sidebar.elements.models') --}}
    {{-- @slot('nombre', 'Mensajes') --}}
    {{-- @slot('nrcreate', 'messeges.create') --}}
    {{-- @slot('nrcrud', 'messeges.index') --}}
    {{-- @slot('nrchart', 'estudiantes.chart') --}}
    {{-- @slot('icon', $icon_menus['messege']) --}}
{{-- @endcomponent --}}
{{-- FIN Mensajes --}}