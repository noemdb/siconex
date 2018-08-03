@extends('expediente.layouts.dashboard.app')
{{-- @section('page_heading','Listado de Usuarios') --}}
@section('main')

    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-2">

        <div class="card bd-callout bd-callout-warning mt-2">

            <div class="card-header">

                <h2>

                    Actualizar Estudiante

                        {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">

                        @include('expediente.estudiantes.menus.edit')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h2>

            </div>

            <div class="card-body p-1">

                @include('expediente.estudiantes.forms.update')

            </div>

        </div>

    </main>

@endsection