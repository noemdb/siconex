<li class="nav-item" title="{{$title or $nombre}}">
  <a class="accordion nav-link" href="#">
    {{-- <span data-feather="home"></span> --}}
    <i class="{{ $icon or '' }} "></i>
    {{$nombre or 'default'}} 
    {{-- <span class="sr-only">(current)</span> --}}
  </a>
  <div class="accordion_panel">
      <ul class="nav flex-column">
          <li class="nav-item">
              <a class="nav-link" href="{{$rcrud or '#'}}">
                {{-- <span data-feather="home"></span> --}}
                CRUD {{-- <span class="sr-only">(current)</span> --}}
              </a>                                                        
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{$rchart or '#'}}">
                {{-- <span data-feather="home"></span> --}}
                Gráficas {{-- <span class="sr-only">(current)</span> --}}
              </a>                                                        
          </li>                                            
      </ul>
  </div> 
</li>