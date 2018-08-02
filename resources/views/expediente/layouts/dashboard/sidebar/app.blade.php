<div class="sidebar-sticky">
    <ul class="nav flex-column">

      {{-- INI Inicio --}}
      <li class="nav-item">

          <a class="nav-link" href="{{ route('home') }}">
            <span data-feather="home"></span>
            Inicio {{-- <span class="sr-only">(current)</span> --}}
          </a>

      </li>
      {{-- FIN Inicio --}}


      <li class="nav-item">

          <a class="accordion nav-link {{ (Request::is('*models*') ? ' accordion_active' : '') }}"  href="#">
            {{-- <span data-feather="home"></span> --}}
            Expedientes {{-- <span class="sr-only">(current)</span> --}}
          </a>

          <div class="accordion_panel" style="display: {{ (Request::is('*models*') ? ' block' : 'none') }}">

              <ul class="nav flex-column">

                  @include('expediente.layouts.dashboard.sidebar.partials.expedientes')

              </ul>

          </div>

      </li>

    </ul>

</div>
