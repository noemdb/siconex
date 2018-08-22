<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active pr-2" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
    <a class="nav-item nav-link pr-2" id="nav-almacen-tab" data-toggle="tab" href="#nav-almacen" role="tab" aria-controls="nav-almacen" aria-selected="false">Almacen</a>
    <a class="nav-item nav-link pr-2" id="nav-movimientos-tab" data-toggle="tab" href="#nav-movimientos" role="tab" aria-controls="nav-movimientos" aria-selected="false">Movimientos</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
    @includeIf('expediente.areas.show.area')
    <a class="btn btn-warning w-100" href="{{ route('areas.edit',$area->id) }}" taske="button">
      Actualizar
      <i class="{{$icon_menus['area'] or ''}}"></i>
    </a>
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-almacen" role="tabpanel" aria-labelledby="nav-almacen-tab">
    @if($area->almacen)
      @php ($almacen = $area->almacen)
      @includeIf('expediente.almacens.show.almacen')
    @endif
  </div> 

  <div class="tab-pane fade m-1 p-1" id="nav-movimientos" role="tabpanel" aria-labelledby="nav-movimientos-tab">
    @if($area->movimientos)
      @php ($movimientos = $area->movimientos)
      @includeIf('expediente.movimientos.show.movimientos')
    @endif
  </div>


</div>