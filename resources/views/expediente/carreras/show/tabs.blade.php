<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active pr-2" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
    <a class="nav-item nav-link pr-2" id="nav-estudiantes-tab" data-toggle="tab" href="#nav-estudiantes" role="tab" aria-controls="nav-estudiantes" aria-selected="false">Estudiantes</a>
    {{-- <a class="nav-item nav-link pr-2" id="nav-carreras-tab" data-toggle="tab" href="#nav-carreras" role="tab" aria-controls="nav-carreras" aria-selected="false">Carreras</a> --}}
    {{-- <a class="nav-item nav-link pr-2" id="nav-estados-tab" data-toggle="tab" href="#nav-estados" role="tab" aria-controls="nav-estados" aria-selected="false">Estados</a> --}}
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
    @includeIf('expediente.carreras.show.carrera')
    <a class="btn btn-warning w-100" href="{{ route('carreras.edit',$carrera->id) }}" taske="button">
      Actualizar
      <i class="{{$icon_menus['carrera'] or ''}}"></i>
    </a>
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-estudiantes" role="tabpanel" aria-labelledby="nav-estudiantes-tab">
    @if($carrera->estudiantes)
      @php ($estudiantes = $carrera->estudiantes)
      {{$estudiantes or 'no hay'}}
      @includeIf('expediente.estudiantes.show.estudiantes')
    @endif

    {{-- @isset($estudiantes) --}}
      {{-- @includeIf('expediente.estudiantes.show.estudiantes') --}}
    {{-- @endisset --}}
  </div>

  {{-- <div class="tab-pane fade m-1 p-1" id="nav-carreras" role="tabpanel" aria-labelledby="nav-carreras-tab"> --}}
    {{-- @isset($messeges) --}}
      {{-- @includeIf('expediente.messeges.show.messeges') --}}
    {{-- @endisset --}}
  {{-- </div> --}}

  {{-- <div class="tab-pane fade m-1 p-1" id="nav-estados" role="tabpanel" aria-labelledby="nav-estados-tab">        --}}
    {{-- @isset($tasks) --}}
      {{-- @includeIf('expediente.tasks.show.tasks') --}}
    {{-- @endisset --}}
  {{-- </div> --}}

</div>