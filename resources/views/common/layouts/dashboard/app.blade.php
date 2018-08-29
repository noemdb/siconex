@extends('common.layouts.app')

@section('body')


        {{-- @include('common.layouts.dashboard.navbar.app') --}}

        {{-- INI navbar --}}
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 navbar-expand-md">
        
            <a class="navbar-brand col-sm-3 col-md-2 m-0 p-0" href="{{ route('home') }}">
                <img class="{{-- mb-4 --}}" src="{{ asset('images/brand/xs/4.png') }}" alt="" width="48" height="48">
                {{ config('app.name', 'Laravel') }}
            </a>

            {{-- <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Buscar"> --}}

            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    @include('layouts.partials.navbar.carduser')
                </li>
            </ul>

            <div class="btn-group float-right" role="group" aria-label="Icons users">
                {{-- <a class="nav-link text-primary" href="#">
                    <i class="{{ $icon_menus['messege'] or '' }} "></i>
                </a> --}}
                <a class="nav-link text-info" href="{{ route('alerts.index') }}">
                    <i class="{{ $icon_menus['alert'] or '' }} "></i>
                </a>
                <a class="nav-link text-success" href="{{ route('tasks.index') }}">
                    <i class="{{ $icon_menus['task'] or '' }} "></i>
                </a>
            </div>

            <button id="btnSidebarCollapse" class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>
        {{-- FIN navbar --}}

        {{-- INI page-wrappe --}}
        <div class="container-fluid">

            <div class="row">

                {{-- INI sidebar --}}
                <nav id="sidebar" class="col-md-2 {{-- d-none --}} d-md-block bg-light p-0 m-0 show">

                    @include('common.layouts.dashboard.sidebar.app')

                </nav>

                @yield('main')

            </div>

        </div>

@endsection

@section('stylesheet')
     @parent

     <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

     <link href="{{ asset('css/accordion.css') }}" rel="stylesheet">

     {{-- <link href="{{ asset('css/common.css') }}" rel="stylesheet"> --}}

@endsection

@section('scripts')
     @parent

     <script src="{{ asset("js/accordion.js") }}"></script>

     <script type="text/javascript">
         $(document).ready(function () {
            $('#sidebar').collapse('hide');
         });
     </script>

@endsection