<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active pr-2" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
    <a class="nav-item nav-link pr-2" id="nav-movimientos-tab" data-toggle="tab" href="#nav-movimientos" role="tab" aria-controls="nav-movimientos" aria-selected="false">Movimientos</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">

  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
    @includeIf('expediente.nivels.show.nivel')
    <a class="btn btn-warning w-100" href="{{ route('nivels.edit',$nivel->id) }}" taske="button">
      Actualizar
      <i class="{{$icon_menus['nivel'] or ''}}"></i>
    </a>
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-movimientos" role="tabpanel" aria-labelledby="nav-movimientos-tab">
    @if($nivel->movimientos)
      @php ($movimientos = $nivel->movimientos)
      @includeIf('expediente.movimientos.show.movimientos')
    @endif
  </div>


</div>