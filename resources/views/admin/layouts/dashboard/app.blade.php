@extends('admin.layouts.app')

@section('body')

    
        {{-- @include('admin.layouts.dashboard.navbar.app') --}}

        {{-- INI navbar --}}
        <nav class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 navbar-expand-md">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">
                {{-- <img class="mb-4" src="{{ asset('images/brand/lg/512.png') }}" alt="" width="72" height="72"> --}}
                {{ config('app.name', 'Laravel') }}
            </a>
            <input class="form-control form-control-dark w-100" type="text" placeholder="Buscar" aria-label="Buscar">

            <ul class="navbar-nav px-3">
                {{-- <li class="nav-item"> --}}
                  {{-- <a class="nav-link" href="{{ route('home') }}">Home</a> --}}
                {{-- </li> --}}
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                        {{-- {{ __('Logout') }} --}}
                        Salir
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                    {{-- <a class="nav-link" href="{{ route('logout') }}">Salir</a> --}}
                    {{-- <a class="nav-link" href="{{ route('home') }}">Home</a> --}}
                </li>
            </ul>

            <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#sidebar" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

        </nav>
        {{-- FIN navbar --}}

        {{-- INI page-wrappe --}}
        <div class="container-fluid">


            <div class="row">


                {{-- INI sidebar --}}
                {{-- <nav class="col-md-2 d-md-block bg-light sidebar"> --}}
                <nav id="sidebar" class="col-md-2 d-none d-md-block bg-light sidebar">

                    @include('admin.layouts.dashboard.sidebar.app')

                </nav>
                {{-- FIN sidebar --}}

                @yield('main')

            </div>


        </div>

@endsection

@section('stylesheet')

     @parent

     <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">

     <link href="{{ asset('css/accordion.css') }}" rel="stylesheet">

     {{-- <link href="{{ asset('css/admin.css') }}" rel="stylesheet"> --}}

@endsection

@section('scripts')

     @parent
     <script src="{{ asset("js/accordion.js") }}"></script>
     
     {{-- 
     <script type="text/javascript">
         $(document).ready(function () {
             $('#sidebarCollapse').on('click', function () {
                 $('#sidebar').toggleClass('active');
                 $("#page-wrapper").toggleClass("active");
             });
         });
     </script> 
     --}}

     {{-- <script src="{{ asset("js/admin.js") }}"></script> --}}

@endsection