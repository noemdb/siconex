<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active pr-2" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
    <a class="nav-item nav-link pr-2" id="nav-expediente-tab" data-toggle="tab" href="#nav-expediente" role="tab" aria-controls="nav-expediente" aria-selected="false">Expediente</a>
    <a class="nav-item nav-link pr-2" id="nav-carreras-tab" data-toggle="tab" href="#nav-carreras" role="tab" aria-controls="nav-carreras" aria-selected="false">Carreras</a>
    <a class="nav-item nav-link pr-2" id="nav-estados-tab" data-toggle="tab" href="#nav-estados" role="tab" aria-controls="nav-estados" aria-selected="false">Estados</a>
    <a class="nav-item nav-link pr-2" id="nav-ltime-tab" data-toggle="tab" href="#ltime" role="ltime" aria-controls="nav-ltime" aria-selected="false">Línea de Tiempo</a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
    @include('expediente.estudiantes.show.estudiante')
    <a class="btn btn-warning w-100" href="{{ route('estudiantes.edit',$estudiante->id) }}" taske="button">
      Actualizar
      <i class="{{$icon_menus['estudiante'] or ''}}"></i>
    </a>
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-expediente" role="tabpanel" aria-labelledby="nav-expediente-tab">

    @if($estudiante->expedientes)
      @php ($expedientes = $estudiante->expedientes)

      @includeIf('expediente.expedientes.show.expedientes')

    @endif

  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-carreras" role="tabpanel" aria-labelledby="nav-carreras-tab">
    @php ($carreras = $estudiante->carreras)
    @isset($carreras)
      @include('expediente.carreras.show.carreras')
    @endisset
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-estados" role="tabpanel" aria-labelledby="nav-estados-tab">
    @php ($estados = $estudiante->estados)
    @isset($estados)
      @includeIf('expediente.estados.show.estados')
    @endisset
  </div>

  <div class="tab-pane fade pt-2" id="ltime" role="tabpanel" aria-labelledby="ltime-tab">
      @include('expediente.elements.widgets.tline')
  </div>

</div>