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

{{-- INI Documentos --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Documentos')
    @slot('nrcrud', 'documentos.index')
    @slot('nrchart', 'documentos.chart')
    @slot('icon', $icon_menus['documento'])
@endcomponent
{{-- FIN Documentos --}}

{{-- INI estados --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Estados')
    @slot('nrcrud', 'estados.index')
    @slot('nrchart', 'estados.chart')
    @slot('icon', $icon_menus['estado'])
@endcomponent
{{-- FIN estados --}}

{{-- INI Estudiantes --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Expedientes')
    @slot('nrcrud', 'expedientes.index')
    @slot('nrchart', 'estudiantes.chart')
    @slot('icon', $icon_menus['expediente'])
@endcomponent
{{-- FIN Estudiantes --}}

{{-- INI Estudiantes --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Estudiantes')
    @slot('nrcrud', 'estudiantes.index')
    @slot('nrchart', 'estudiantes.chart')
    @slot('icon', $icon_menus['estudiante'])
@endcomponent
{{-- FIN Estudiantes --}}

{{-- INI Movimientos --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Movimientos')
    @slot('nrcrud', 'movimientos.index')
    @slot('nrchart', 'movimientos.chart')
    @slot('icon', $icon_menus['movimiento'])
@endcomponent
{{-- FIN Movimientos --}}

{{-- INI Niveles --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Niveles')
    @slot('nrcrud', 'nivels.index')
    @slot('nrchart', 'nivels.chart')
    @slot('icon', $icon_menus['nivel'])
@endcomponent
{{-- FIN Niveles --}}

