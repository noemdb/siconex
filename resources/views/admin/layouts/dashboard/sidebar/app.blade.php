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
            <span data-feather="home"></span>
            Modelos {{-- <span class="sr-only">(current)</span> --}}
          </a>

          <div class="accordion_panel">

              <ul class="nav flex-column">
                  <li class="nav-item">
                      <a class="accordion nav-link" href="#">
                        <span data-feather="home"></span>
                        Usuarios {{-- <span class="sr-only">(current)</span> --}}
                      </a>
                      <div class="accordion_panel">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('users.index') }}">
                                    <span data-feather="home"></span>
                                    CRUD {{-- <span class="sr-only">(current)</span> --}}
                                  </a>                                                        
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">
                                    <span data-feather="home"></span>
                                    Gráficas {{-- <span class="sr-only">(current)</span> --}}
                                  </a>                                                        
                              </li>                                            
                          </ul>
                      </div>   
                  </li>

                  <li class="nav-item">
                      <a class="accordion nav-link" href="#">
                        <span data-feather="home"></span>
                        Perfiles {{-- <span class="sr-only">(current)</span> --}}
                      </a>
                      <div class="accordion_panel">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('profiles.index') }}">
                                    <span data-feather="home"></span>
                                    CRUD {{-- <span class="sr-only">(current)</span> --}}
                                  </a>                                                        
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">
                                    <span data-feather="home"></span>
                                    Gráficas {{-- <span class="sr-only">(current)</span> --}}
                                  </a>                                                        
                              </li>                                            
                          </ul>
                      </div>   
                  </li>

                  <li class="nav-item">
                      <a class="accordion nav-link" href="#">
                        <span data-feather="home"></span>
                        Roles {{-- <span class="sr-only">(current)</span> --}}
                      </a>
                      <div class="accordion_panel">
                          <ul class="nav flex-column">
                              <li class="nav-item">
                                  <a class="nav-link" href="{{ route('rols.index') }}">
                                    <span data-feather="home"></span>
                                    CRUD {{-- <span class="sr-only">(current)</span> --}}
                                  </a>                                                        
                              </li>
                              <li class="nav-item">
                                  <a class="nav-link" href="#">
                                    <span data-feather="home"></span>
                                    Gráficas {{-- <span class="sr-only">(current)</span> --}}
                                  </a>                                                        
                              </li>                                            
                          </ul>
                      </div>   
                  </li>
              </ul>                                    

          </div>

      </li>

    </ul>

</div>
