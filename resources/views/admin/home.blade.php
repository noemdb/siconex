@extends('admin.layouts.dashboard.app')


@section('page_heading')
    {{-- <div class="col-lg-12"> --}}
        <h1 class="page-header">
            Dashboard
        </h1>
    {{-- </div> --}}
@endsection


@section('section')

    <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
        <h1 class="page-header">
                Dashboard
        </h1>
    </main>

@endsection
{{-- FIN section--}}

@section('stylesheet')
    @parent

    {{-- <link rel="stylesheet" href="{{ asset('css/timeline.css') }}"> --}}

@endsection


@section('scripts')
    @parent

@endsection
