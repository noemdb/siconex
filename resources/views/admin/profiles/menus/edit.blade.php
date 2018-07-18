@component('admin.elements.buttons.default')
    @slot('title', 'Crear nuevo Usuario')
    @slot('class_bt', 'primary')
    @slot('route', route('users.create'))
    @slot('icon', $icon_menus['userplus'])
@endcomponent

@component('admin.elements.buttons.default')
    @slot('title', 'CRUD de Usuarios')
    @slot('class_bt', 'info')
    @slot('route', route('users.index'))
    @slot('icon', $icon_menus['crud'])
@endcomponent

{{-- @component('admin.elements.buttons.default')
    @slot('title', 'CRUD Perfiles')
    @slot('class_bt', 'info')
    @slot('route', route('profiles.index'))
    @slot('icon', 'fas fa-id-card')
@endcomponent

@component('admin.elements.buttons.default')
    @slot('title', 'CRUD Roles')
    @slot('class_bt', 'info')
    @slot('route', route('rols.index'))
    @slot('icon', 'fas fa-id-badge')
@endcomponent --}}

@component('admin.elements.buttons.default')
    @slot('title', 'Ir atrás')
    @slot('class_bt', 'dark')
    @slot('route', url()->previous())
    @slot('icon', 'fas fa-chevron-left')
@endcomponent

@component('admin.elements.buttons.default')
    @slot('title', 'Refrescar la página')
    @slot('class_bt', 'dark')
    @slot('route', url()->current())
    @slot('icon', 'fas fa-redo')
@endcomponent