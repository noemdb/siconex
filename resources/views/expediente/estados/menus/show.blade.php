@component('elements.buttons.default')
    @slot('title', 'Crear Nuevo Almacen')
    @slot('class_bt', 'primary')
    @slot('route', route('estados.create'))
    @slot('icon', $icon_menus['nuevo'])
@endcomponent

@component('elements.buttons.default')
    @slot('title', 'CRUD')
    @slot('class_bt', 'info')
    @slot('route', route('estados.index'))
    @slot('icon', $icon_menus['crud'])
@endcomponent

@component('elements.buttons.default')
    @slot('title', 'Gráficas')
    @slot('class_bt', 'success')
    @slot('route', route('estados.chart'))
    @slot('icon', $icon_menus['chartbar'])
@endcomponent


{{-- @component('elements.menus.dropdown')
    @slot('title', 'CRUD relacionados')
    @slot('class', 'info')
    @slot('icon', $icon_menus['crud'])
    @slot('dropdown') --}}
        {{-- @component('elements.buttons.dropdown')
            @slot('title', 'CRUD Estados')
            @slot('class_bt', 'info')
            @slot('route', route('estados.index'))
            @slot('icon', $icon_menus['estado'])
        @endcomponent --}}
{{--         @component('elements.buttons.dropdown')
            @slot('title', 'CRUD Tareas')
            @slot('class_bt', 'info')
            @slot('route', route('tasks.index'))
            @slot('icon', $icon_menus['task'])
        @endcomponent
        @component('elements.buttons.dropdown')
            @slot('title', 'CRUD Usuarios')
            @slot('class_bt', 'info')
            @slot('route', route('users.index'))
            @slot('icon', $icon_menus['user'])
        @endcomponent
        @component('elements.buttons.dropdown')
            @slot('title', 'CRUD Perfiles')
            @slot('class_bt', 'info')
            @slot('route', route('profiles.index'))
            @slot('icon', $icon_menus['profile'])
        @endcomponent
    @endslot
@endcomponent
 --}}
@component('elements.buttons.default')
    @slot('title', 'Ir atrás')
    @slot('class_bt', 'dark')
    @slot('route', url()->previous())
    @slot('icon', 'fas fa-chevron-left')
@endcomponent

@component('elements.buttons.default')
    @slot('title', 'Refrescar la página')
    @slot('class_bt', 'dark')
    @slot('route', url()->current())
    @slot('icon', 'fas fa-redo')
@endcomponent