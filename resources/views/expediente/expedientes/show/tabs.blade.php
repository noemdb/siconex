<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active pr-2" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
    <a class="nav-item nav-link pr-2" id="nav-documento-tab" data-toggle="tab" href="#nav-documento" role="tab" aria-controls="nav-documento" aria-selected="false">Documentos</a>
    <a class="nav-item nav-link pr-2" id="nav-movimiento-tab" data-toggle="tab" href="#nav-movimiento" role="tab" aria-controls="nav-movimiento" aria-selected="false">Movimientos</a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
    @include('expediente.expedientes.show.expediente')
    <a class="btn btn-warning w-100" href="{{ route('expedientes.edit',$expediente->id) }}" taske="button">
      Actualizar
      <i class="{{$icon_menus['expediente'] or ''}}"></i>
    </a>
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-documento" role="tabpanel" aria-labelledby="nav-documento-tab">
    @php ($documentos = $expediente->documentos)
    @isset($documentos)
      @includeIf('expediente.documentos.show.documentos')
    @endisset
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-movimiento" role="tabpanel" aria-labelledby="nav-movimiento-tab">
    @php ($movimientos = $expediente->movimientos)
    @isset($movimientos)
      {{-- @include('expediente.movimientos.show.movimientos') --}}
    @endisset
  </div>
  
</div>