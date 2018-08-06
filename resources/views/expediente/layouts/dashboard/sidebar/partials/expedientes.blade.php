{{-- INI Estudiantes --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Almacenes')
    @slot('nrcrud', 'almacens.index')
    @slot('nrchart', 'almacens.chart')
    @slot('icon', $icon_menus['almacen'])
@endcomponent
{{-- FIN Estudiantes --}}

{{-- INI Carreras --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Carreras')
    @slot('nrcrud', 'carreras.index')
    @slot('nrchart', 'carreras.chart')
    @slot('icon', $icon_menus['carrera'])
@endcomponent
{{-- FIN Carreras --}}

{{-- INI Estudiantes --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Estudiantes')
    @slot('nrcrud', 'estudiantes.index')
    @slot('nrchart', 'estudiantes.chart')
    @slot('icon', $icon_menus['estudiante'])
@endcomponent
{{-- FIN Estudiantes --}}
