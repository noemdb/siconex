@extends('expediente.layouts.dashboard.app')

{{-- @section('page_heading','Listado de Usuarios') --}}

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10 px-2">

        <div class="card mt-2 bd-callout bd-callout-info">

            <div class="card-header">

                <h2>

                    Información del Estudiante

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">

                        @include('expediente.estudiantes.menus.show')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h2>

            </div>



            <div class="card-body p-1">

                <div class="container p-1">

                    <div class="row">

                        
                        <div class="col-sm-3 text-center">

                            {{-- <img alt="{{$estudiante->id or ''}}" class="img-thumbnail img-rounded" src="{{ (isset($estudiante->urlimg)) ? asset($estudiante->url_img) : asset('images/avatar/user_default.png') }}"> --}}
                            <img alt="{{$estudiante->id or ''}}" class="img-thumbnail img-rounded" src="{{ asset('images/avatar/user_default.png') }}">

                        </div> 
                       

                        <div class="col-sm-9">

                            @include('expediente.estudiantes.show.tabs')
                            {{-- @include('expediente.estudiantes.show.tabs') --}}

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </main>

@endsection