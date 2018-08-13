{{-- INI Almacenes --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Almacenes')
    @slot('nrcreate', 'almacens.create')
    @slot('nrcrud', 'almacens.index')
    @slot('nrchart', 'almacens.chart')
    @slot('icon', $icon_menus['almacen'])
@endcomponent
{{-- FIN Almacenes --}}

{{-- INI Areas --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Areas')
    @slot('nrcreate', 'areas.create')
    @slot('nrcrud', 'areas.index')
    @slot('nrchart', 'areas.chart')
    @slot('icon', $icon_menus['area'])
@endcomponent
{{-- FIN Areas --}}

{{-- INI Estudiantes --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Estudiantes')
    @slot('nrcreate', 'estudiantes.create')
    @slot('nrcrud', 'estudiantes.index')
    @slot('nrchart', 'estudiantes.chart')
    @slot('icon', $icon_menus['estudiante'])
@endcomponent
{{-- FIN Estudiantes --}}

{{-- INI Carreras --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Carreras')
    @slot('nrcreate', 'carreras.create')
    @slot('nrcrud', 'carreras.index')
    @slot('nrchart', 'carreras.chart')
    @slot('icon', $icon_menus['carrera'])
@endcomponent
{{-- FIN Carreras --}}

{{-- INI estados --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Estados')
    @slot('nrcreate', 'estados.create')
    @slot('nrcrud', 'estados.index')
    @slot('nrchart', 'estados.chart')
    @slot('icon', $icon_menus['estado'])
@endcomponent
{{-- FIN estados --}}

{{-- INI expediente --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Expedientes')
    @slot('nrcreate', 'expedientes.create')
    @slot('nrcrud', 'expedientes.index')
    @slot('nrchart', 'expedientes.chart')
    @slot('icon', $icon_menus['expediente'])
@endcomponent
{{-- FIN expediente --}}

{{-- INI Documentos --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Documentos')
    @slot('nrcreate', 'documentos.create')
    @slot('nrcrud', 'documentos.index')
    @slot('nrchart', 'documentos.chart')
    @slot('icon', $icon_menus['documento'])
@endcomponent
{{-- FIN Documentos --}}

{{-- INI Movimientos --}}
@component('expediente.layouts.dashboard.sidebar.elements.models')
    @slot('nombre', 'Movimientos')
    @slot('nrcreate', 'movimientos.create')
    @slot('nrcrud', 'movimientos.index')
    @slot('nrchart', 'movimientos.chart')
    @slot('icon', $icon_menus['movimiento'])
@endcomponent
{{-- FIN Movimientos --}}



