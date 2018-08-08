@extends('expediente.layouts.dashboard.app')

{{-- @section('page_heading','Listado de Usuarios') --}}

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10 px-2">

        <div class="card mt-2 bd-callout bd-callout-info">

            <div class="card-header">

                <h2>

                    Información del Expediente

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">

                        @include('expediente.expedientes.menus.show')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h2>

            </div>



            <div class="card-body p-1">

                <div class="container p-1">

                    <div class="row">


                        <div class="col-sm-4 text-center">

                            {{-- <img alt="{{$expediente->id or ''}}" class="img-thumbnail img-rounded" src="{{ (isset($expediente->urlimg)) ? asset($expediente->url_img) : asset('images/avatar/user_default.png') }}"> --}}
                            <img alt="{{$expediente->id or ''}}" class="img-thumbnail img-rounded" src="{{ asset('images/avatar/user_default.png') }}">

                        </div>


                        <div class="col-sm-8">

                            {{-- Partial con los tabs de usuario (perfiles, Expedientes) --}}
                            {{-- @php ($user = $expediente->user)
                            @isset($user->profile)
                                @php ($profile = $user->profile)
                            @endisset
                            @isset($user->tasks)
                                @php ($tasks = $user->tasks)
                            @endisset --}}

                            {{-- @include('expediente.expedientes.show.tabs') --}}
                            {{-- @include('expediente.expedientes.show.expediente') --}}

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </main>

@endsection