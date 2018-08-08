<nav>
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active pr-2" id="nav-general-tab" data-toggle="tab" href="#nav-general" role="tab" aria-controls="nav-general" aria-selected="true">General</a>
    <a class="nav-item nav-link pr-2" id="nav-expediente-tab" data-toggle="tab" href="#nav-expediente" role="tab" aria-controls="nav-expediente" aria-selected="false">Expediente</a>
    <a class="nav-item nav-link pr-2" id="nav-estados-tab" data-toggle="tab" href="#nav-estados" role="tab" aria-controls="nav-estados" aria-selected="false">Estados</a>
    <a class="nav-item nav-link pr-2" id="nav-estados-tab" data-toggle="tab" href="#nav-estados" role="tab" aria-controls="nav-estados" aria-selected="false">Estados</a>
  </div>
</nav>
<div class="tab-content" id="nav-tabContent">
  <div class="tab-pane fade show active" id="nav-general" role="tabpanel" aria-labelledby="nav-general-tab">
    @includeIf('expediente.estados.show.estado')
    <a class="btn btn-warning w-100" href="{{ route('estados.edit',$estado->id) }}" taske="button">
      Actualizar
      <i class="{{$icon_menus['estado'] or ''}}"></i>
    </a>
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-expediente" role="tabpanel" aria-labelledby="nav-expediente-tab">
    {{-- @isset($messeges) --}}
      {{-- @includeIf('expediente.messeges.show.messeges') --}}
    {{-- @endisset --}}
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-estados" role="tabpanel" aria-labelledby="nav-estados-tab">
    {{-- @isset($messeges) --}}
      {{-- @includeIf('expediente.messeges.show.messeges') --}}
    {{-- @endisset --}}
  </div>

  <div class="tab-pane fade m-1 p-1" id="nav-estados" role="tabpanel" aria-labelledby="nav-estados-tab">
    {{-- @isset($tasks) --}}
      {{-- @includeIf('expediente.tasks.show.tasks') --}}
    {{-- @endisset --}}
  </div>

</div>