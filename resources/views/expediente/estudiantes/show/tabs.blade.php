<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
    <a class="nav-item nav-link" id="nav-estudiante-tab" data-toggle="tab" href="#nav-estudiante" role="tab" aria-controls="nav-estudiante" aria-selected="false">Usuario</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
    @includeIf('expediente.estudiantes.show.estudiante')
    <a class="btn btn-warning w-100" href="{{ route('estudiantes.edit',$estudiante->id) }}" taske="button">
      Actualizar
      <i class="{{$icon_menus['estudiante'] or ''}}"></i>
    </a>
  </div>

  <div class="tab-pane fade" id="nav-estudiante" role="tabpanel" aria-labelledby="nav-estudiante-tab">
   
    @isset($estudiante)

      <div class="card m-2">
        <div class="card-body">

          <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
              <a class="nav-item nav-link active" id="nav-guser-tab" data-toggle="tab" href="#nav-guser" role="tab" aria-controls="nav-guser" aria-selected="true">General</a>
              <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Expedientes</a>
              <a class="nav-item nav-link" id="nav-messege-tab" data-toggle="tab" href="#nav-messege" role="tab" aria-controls="nav-messege" aria-selected="false">Estado</a>
              <a class="nav-item nav-link" id="nav-tasks-tab" data-toggle="tab" href="#nav-tasks" role="tab" aria-controls="nav-tasks" aria-selected="false">Carrera</a>
            </div>
          </nav>

          <div class="tab-content" id="nav-tabContent">

            <div class="tab-pane fade show active m-1 p-1" id="nav-guser" role="tabpanel" aria-labelledby="nav-guser-tab">
              @include('expediente.estudiantes.show.estudiante')
              <a class="btn btn-info w-100" href="{{ route('users.show',$estudiante->id) }}" taske="button">
                Mostrar
                <i class="{{$icon_menus['estudiante'] or ''}}"></i>
              </a>
            </div>

            <div class="tab-pane fade m-1 p-1" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
              {{-- @isset($profile) --}}
                {{-- @include('expediente.profiles.show.profile') --}}
                <a class="btn btn-info w-100" href="{{-- {{ route('profiles.show',$profile->id) }} --}}" taske="button">
                  Actualizar
                  {{-- <i class="{{$icon_menus['profile'] or ''}}"></i> --}}
                </a>
              {{-- @endisset          --}}
            </div>

            <div class="tab-pane fade m-1 p-1" id="nav-messege" role="tabpanel" aria-labelledby="nav-messege-tab">
              {{-- @isset($messeges) --}}
                {{-- @includeIf('expediente.messeges.show.messeges') --}}
              {{-- @endisset --}}
            </div>

            <div class="tab-pane fade m-1 p-1" id="nav-tasks" role="tabpanel" aria-labelledby="nav-tasks-tab">       
              {{-- @isset($tasks) --}}
                {{-- @includeIf('expediente.tasks.show.tasks') --}}
              {{-- @endisset --}}
            </div>

          </div>

        </div>

      </div>

    @endisset
    
  </div>
</div>