<nav class="nav nav-tabs ranges" id="nav-tab" role="tablist" data-canvas="{{ $id_chart or ''}}" data-urlapi="{{ $urlapi or ''}}" data-tipo="{{ $tipo or ''}}" data-limit="{{ $limit or ''}}" data-legend="{{ $legend or ''}}">
  <a data-range="Todos" class="nav-item nav-link active" id="nav-todos-tab" data-toggle="tab" href="#nav-todos" role="tab" aria-controls="nav-todos" aria-selected="false">Todos</a>
  <a data-range="12" class="nav-item nav-link" id="nav-365-tab" data-toggle="tab" href="#nav-12" role="tab" aria-controls="nav-12" aria-selected="false">12M</a>
  <a data-range="9" class="nav-item nav-link" id="nav-90-tab" data-toggle="tab" href="#nav-9" role="tab" aria-controls="nav-9" aria-selected="false">9M</a>
  <a data-range="6" class="nav-item nav-link" id="nav-30-tab" data-toggle="tab" href="#nav-6" role="tab" aria-controls="nav-6" aria-selected="false">6M</a>
  <a data-range="3" class="nav-item nav-link" id="nav-7-tab" data-toggle="tab" href="#nav-3" role="tab" aria-controls="nav-3" aria-selected="false">3M</a>
</nav>