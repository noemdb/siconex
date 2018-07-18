@component('admin.elements.buttons.default')
    @slot('title', 'Crear nuevo Rol')
    @slot('class_bt', 'primary')
    @slot('route', route('rols.create'))
    @slot('icon', 'fas fa-plus')
@endcomponent

@component('admin.elements.buttons.default')
    @slot('title', 'CRUD Usuarios')
    @slot('class_bt', 'info')
    @slot('route', route('users.index'))
    @slot('icon', 'fas fa-user')
@endcomponent

@component('admin.elements.buttons.default')
    @slot('title', 'CRUD Perfiles')
    @slot('class_bt', 'info')
    @slot('route', route('profiles.index'))
    @slot('icon', 'fas fa-id-card')
@endcomponent

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