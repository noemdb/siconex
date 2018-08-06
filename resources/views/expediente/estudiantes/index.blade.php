@extends('expediente.layouts.dashboard.app')

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10">

        <div class="card mt-2 bd-callout bd-callout-primary">
            <div class="card-header">
                <h3>
                    Listados de Estudiantes Registrados<br>
                    <small class="text-default">
                        <strong><span id="estudiante_counter">{{$estudiantes->count()}}</span> Estudiantes</strong>
                    </small>

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">
                        @include('expediente.estudiantes.menus.index')
                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="card-body p-1">

                {{-- Mensaje session-flash sobre operaciones con base de datos --}}
                @include('expediente.elements.messeges.oper_ok')

                {{-- Partial con el listado de los usuarios --}}
                @include('expediente.estudiantes.table.list')

            </div>
        </div>
    </main>

    {!! Form::open(['route' => ['estudiantes.destroy',':ESTUDIANTE_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'estudiante'=>'form']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent

    {{-- INI script ajax json models --}}
    <script src="{{ asset("js/models/expediente/estudiantes/delete.js") }}"></script>
    {{-- FIN script ajax json models --}}

@endsection