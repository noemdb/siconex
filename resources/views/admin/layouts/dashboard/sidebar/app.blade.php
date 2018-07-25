<div class="sidebar-sticky">
    <ul class="nav flex-column">

      {{-- INI Sistema --}}
      <li class="nav-item">

          <a class="nav-link" href="{{ route('home') }}">
            <span data-feather="home"></span>
            Inicio {{-- <span class="sr-only">(current)</span> --}}
          </a>

      </li>
      {{-- FIN Sistema --}}

      <li class="nav-item">

          <a class="accordion nav-link" href="#">
            {{-- <span data-feather="home"></span> --}}
            Modelos {{-- <span class="sr-only">(current)</span> --}}
          </a>

          <div class="accordion_panel">

              <ul class="nav flex-column">

                  {{-- INI User --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'Usuarios')
                      @slot('rcrud', route('users.index'))
                      @slot('rchart', route('users.chart'))
                      @slot('icon', $icon_menus['user'])
                  @endcomponent
                  {{-- FIN user --}}


                  {{-- INI profiles --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'Perfiles')
                      @slot('rcrud', route('profiles.index'))
                      @slot('rchart', '#')
                      @slot('icon', $icon_menus['profile'])
                  @endcomponent
                  {{-- FIN profiles --}}


                  {{-- INI Rols --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'Roles')
                      @slot('rcrud', route('rols.index'))
                      @slot('rchart', '#')
                      @slot('icon', $icon_menus['rol'])
                  @endcomponent
                  {{-- FIN Rols --}}

                  {{-- INI Tasks --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'Tasks')
                      @slot('rcrud', route('tasks.index'))
                      @slot('rchart', '#')
                      @slot('icon', $icon_menus['task'])
                  @endcomponent
                  {{-- FIN Tasks --}}

                  {{-- INI Alertas --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'Alertas')
                      @slot('rcrud', route('alerts.index'))
                      @slot('rchart', '#')
                      @slot('icon', $icon_menus['alert'])
                  @endcomponent
                  {{-- FIN Alertas --}}

                  {{-- INI settings --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'Settings')
                      @slot('rcrud', route('settings.index'))
                      @slot('rchart', '#')
                      @slot('icon', $icon_menus['setting'])
                  @endcomponent
                  {{-- FIN settings --}}

                  {{-- INI SelectOpts --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'SelectOpts')
                      @slot('rcrud', route('selectopts.index'))
                      @slot('rchart', '#')
                      @slot('icon', $icon_menus['selectopt'])
                  @endcomponent
                  {{-- FIN SelectOpts --}}

                  {{-- INI Loginout --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'Loginout')
                      @slot('rcrud', route('loginouts.index'))
                      @slot('rchart', '#')
                      @slot('icon', $icon_menus['loginout'])
                  @endcomponent
                  {{-- FIN Loginout --}}

                  {{-- INI Logdb --}}
                  @component('admin.layouts.dashboard.sidebar.elements.models')
                      @slot('nombre', 'Logdb')
                      @slot('rcrud', route('logdbs.index'))
                      @slot('rchart', '#')
                      @slot('icon', $icon_menus['logdb'])
                  @endcomponent
                  {{-- FIN Logdb --}}

              </ul>

          </div>

      </li>

    </ul>

</div>
