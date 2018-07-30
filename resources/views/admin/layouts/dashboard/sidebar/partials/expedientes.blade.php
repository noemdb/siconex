{{-- INI User --}}
@component('admin.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Usuarios')
    @slot('nrcrud', 'users.index')
    @slot('nrchart', 'users.chart')
    @slot('icon', $icon_menus['user'])
@endcomponent
{{-- FIN user --}}

{{-- INI Tasks --}}
@component('admin.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Tasks')
    @slot('nrcrud', 'tasks.index')
    @slot('nrchart', 'tasks.chart')
    @slot('icon', $icon_menus['task'])
@endcomponent
{{-- FIN Tasks --}}

{{-- INI Alertas --}}
@component('admin.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Alertas')
    @slot('nrcrud', 'alerts.index')
    @slot('nrchart', 'alerts.chart')
    @slot('icon', $icon_menus['alert'])
@endcomponent
{{-- FIN Alertas --}}