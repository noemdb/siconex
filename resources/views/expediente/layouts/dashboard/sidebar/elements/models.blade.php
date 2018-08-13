@php ($model = strstr($nrcrud,'.',true))

<li class="nav-item" title="{{$title or $nombre}}">
  <a class="accordion nav-link  {{ (Request::is('*'.$model.'*') ? ' accordion_active' : '') }}" href="#">
    {{-- <span data-feather="home"></span> --}}
    <i class="{{ $icon or '' }} "></i>
    {{$nombre or 'default'}}
    {{-- <span class="sr-only">(current)</span> --}}
  </a>
  <div class="accordion_panel" style="display: {{ (Request::is('*'.$model.'*') ? ' block' : 'none') }}">
      <ul class="nav flex-column">


          @isset($nrcreate)
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('*crud/'.$model.'*') ? ' active' : '') }}" href="{{route($nrcreate)}}">
                  <i class="{{ $icon_menus['nuevo'] or '' }}"></i>
                  Nuevo {{-- <span class="sr-only">(current)</span> --}}
                </a>
            </li>
          @endisset

          @isset($nrcrud)
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('*crud/'.$model.'*') ? ' active' : '') }}" href="{{route($nrcrud)}}">
                  <i class="{{ $icon_menus['crud'] or '' }} "></i>
                  CRUD {{-- <span class="sr-only">(current)</span> --}}
                </a>
            </li>
          @endisset
          @isset($nrchart)
            <li class="nav-item">
                <a class="nav-link {{ (Request::is('*charts/'.$model.'*') ? ' active' : '') }}" href="{{route($nrchart)}}">
                  <i class="{{ $icon_menus['chartbar'] or '' }} "></i>
                  Gráficas {{-- <span class="sr-only">(current)</span> --}}
                </a>
            </li>
          @endisset
      </ul>
  </div>
</li>