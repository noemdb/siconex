 {{-- ini tab --}}
<nav class="pt-1 mt-1">
  <div class="nav nav-tabs" id="nav-tab" role="tablist">
    <a class="nav-item nav-link active" id="nav-tab01-tab" data-toggle="tab" href="#nav-tab01" role="tab" aria-controls="nav-tab01" aria-selected="true">Gráficas 1</a>
    {{-- <a class="nav-item nav-link" id="nav-tab02-tab" data-toggle="tab" href="#nav-tab02" role="tab" aria-controls="nav-tab02" aria-selected="false">Gráficas 2</a> --}}
  </div>
</nav>

<div class="tab-content" id="nav-tabContent">
  {{-- ini tab01 --}}
  <div class="tab-pane fade show active" id="nav-tab01" role="tabpanel" aria-labelledby="nav-tab01-tab">

      <div class="row">

        <div class="col-lg-6 col-md-6 col-sm-12">

            @include('expediente.estados.chart.estadosmonths')

        </div>

        <div class="col-lg-6 col-md-6 col-sm-12">

          {{-- @include('expediente.estados.chart.almacensexps') --}}

        </div>

      </div>

  </div>
  {{-- fin tab01 --}}

  {{-- ini tab02 --}}
  {{-- <div class="tab-pane fade" id="nav-tab02" role="tabpanel" aria-labelledby="nav-tab02-tab"> --}}

      {{-- <div class="row"> --}}

        {{-- <div class="col-lg-6 col-md-6 col-sm-12"> --}}

          {{-- @include('expediente.estados.chart.almacensdocs') --}}

        {{-- </div> --}}

        {{-- <div class="col-lg-6 col-md-6 col-sm-12"> --}}

          {{-- @include('expediente.estados.chart.almacensmonths') --}}

        {{-- </div> --}}

      {{-- </div> --}}

  {{-- </div> --}}
  {{-- fin tab02 --}}
</div>
{{-- fin tab --}}