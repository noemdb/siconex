@extends('common.layouts.dashboard.app')
{{-- @extends('common.layouts.app_sidebar') --}}


@section('page_heading')
    {{-- <div class="col-lg-12"> --}}
        <h1 class="page-header">
            Dashboard
        </h1>
    {{-- </div> --}}
@endsection

@section('main')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 class="page-header">
                {{-- Dashboard --}}
        </h1>

        {{-- labels --}}
        {{-- @includeIf('common.home.partials.labels') --}}

        {{-- listas --}}
        {{-- @includeIf('common.home.partials.list') --}}

        {{-- graficas --}}
        {{-- @includeIf('common.home.partials.graphics') --}}

    </main>

@endsection
{{-- FIN section--}}

@section('stylesheet')
    @parent

    {{-- <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"> --}}

@endsection

@section('scripts')
    @parent
    <script type="text/javascript">
        swal({
          type: 'success',
          title: 'Excelente! Bienvenido',
          html: '<i class="{{ $icon_menus['brand'] }} text-success"></i> Control de Expediente',
        })
    </script>
@endsection
