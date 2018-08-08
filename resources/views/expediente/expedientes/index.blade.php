@extends('expediente.layouts.dashboard.app')

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10">

        <div class="card mt-2 bd-callout bd-callout-primary">
            <div class="card-header">
                <h3>
                    Listados de Expedientes Registrados<br>
                    <small class="text-default">
                        <strong><span id="expediente_counter">{{$expedientes->count()}}</span> Expedientes</strong>
                    </small>

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">
                        @include('expediente.expedientes.menus.index')
                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="card-body p-1">

                {{-- Mensaje session-flash sobre operaciones con base de datos --}}
                @include('expediente.elements.messeges.oper_ok')

                {{-- Partial con el listado de los usuarios --}}
                @include('expediente.expedientes.table.list')

            </div>
        </div>
    </main>

    {!! Form::open(['route' => ['expedientes.destroy',':EXPEDIENTE_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'expediente'=>'form']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent

    {{-- INI script ajax json models --}}
    <script src="{{ asset("js/models/expediente/expedientes/delete.js") }}"></script>
    {{-- FIN script ajax json models --}}

@endsection