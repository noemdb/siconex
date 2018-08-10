<div class="sidebar-sticky">

    <ul class="nav flex-column">

      {{-- INI Inicio --}}
      <li class="nav-item">

          <a class="nav-link" href="{{ route('expediente.home') }}">
            <span data-feather="home"></span>
            Inicio {{-- <span class="sr-only">(current)</span> --}}
          </a>

      </li>
      {{-- FIN Inicio --}}


      <li class="nav-item">

        <ul class="nav flex-column">

            @include('expediente.layouts.dashboard.sidebar.partials.expedientes')

        </ul>

      </li>

    </ul>

</div>
