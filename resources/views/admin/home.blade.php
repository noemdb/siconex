@extends('admin.layouts.dashboard.app')

@section('main')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 class="page-header">
            Panel de Administración
        </h1>

        {{-- labels --}}
        @includeIf('common.home.partials.admin.labels')

        {{-- listas --}}
        {{-- @includeIf('common.home.partials.list') --}}

        {{-- graficas system --}}
        @includeIf('admin.home.partials.graphics')

        {{-- graficas common--}}
        @includeIf('common.home.partials.graphics')

    </main>

@endsection
{{-- FIN section main--}}

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
          html: '<i class="{{ $icon_menus['brand'] }} text-warning"></i> Administración del Sistema',
        })
    </script>

@endsection
