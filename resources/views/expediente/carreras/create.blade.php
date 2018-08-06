@extends('expediente.layouts.dashboard.app')

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">

        <div class="card bd-callout bd-callout-primary mt-2 ">

            <div class="card-header">

                <h2>

                    Nueva Carrera

                        {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">

                        @include('expediente.carreras.menus.create')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h2>

            </div>

            <div class="card-body">

                @include('expediente.carreras.forms.create')

            </div>

        </div>

    </main>

@endsection

@section('scripts')
    @parent

    {{-- <script src="{{ asset("js/models/users/create.js") }}"></script> --}}

@endsection