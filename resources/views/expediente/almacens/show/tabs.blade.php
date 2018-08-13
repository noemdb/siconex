<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active pr-2" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
    <a class="nav-item nav-link pr-2" id="nav-areas-tab" data-toggle="tab" href="#nav-areas" role="tab" aria-controls="nav-areas" aria-selected="false">Áreas</a>
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
    @includeIf('expediente.almacens.show.almacen')
    <a class="btn btn-warning w-100" href="{{ route('almacens.edit',$almacen->id) }}" taske="button">
      Actualizar
      <i class="{{$icon_menus['almacen'] or ''}}"></i>
    </a>
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-areas" role="tabpanel" aria-labelledby="nav-areas-tab">
    @if($almacen->areas)
      @php ($areas = $almacen->areas)
      @includeIf('expediente.areas.show.areas')
    @endif
  </div>

</div>