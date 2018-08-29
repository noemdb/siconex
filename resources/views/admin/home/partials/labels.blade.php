{{-- INI dashboard widget --}}
<div class="container">
    {{-- INI labels --}}
    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 p-1">
            {{-- INI card-collapse tasks --}}
            @component('elements.widgets.label')
                @slot('class', 'success')
                @slot('iconTitle', $icon_menus['user'].' fa-3x')
                @slot('total', $users->count())
                @slot('title', 'Usuarios Registrados')
                @slot('subtitle', 'Últimos 5')
                @slot('headercollapse', 'Mas detalles')
                @slot('id', 'idusers_label')
                @slot('panelControls', true)
                @slot('body')
                    @include('elements.widgets.users.list',[
                        'users'=>$users->take(5),
                        'show_user'=>'true'
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
                @slot('class', 'warning')
                @slot('iconTitle', $icon_menus['profile'].' fa-3x')
                @slot('total', $profiles->count())
                @slot('title', 'Perfiles Registrados')
                @slot('subtitle', 'Últimos 5')
                @slot('headercollapse', 'Mas detalles')
                @slot('id', 'idprofiles_label')
                @slot('panelControls', true)
                @slot('body')
                    @include('elements.widgets.profiles.list',[
                        'profiles'=>$profiles->take(5),
                        'show_profile'=>'true'
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