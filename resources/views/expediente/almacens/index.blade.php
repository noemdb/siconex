@extends('expediente.layouts.dashboard.app')

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10">

        <div class="card mt-2 bd-callout bd-callout-primary">
            <div class="card-header">
                <h3>
                    Listados de Almacenes Registrados<br>
                    <small class="text-default">
                        <strong><span id="almacen_counter">{{$almacens->count()}}</span> Almacenes</strong>
                    </small>

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">
                        @include('expediente.almacens.menus.index')
                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="card-body p-1">

                {{-- Mensaje session-flash sobre operaciones con base de datos --}}
                @include('expediente.elements.messeges.oper_ok')

                {{-- Partial con el listado de los usuarios --}}
                @include('expediente.almacens.table.list')

            </div>
        </div>
    </main>

    {!! Form::open(['route' => ['almacens.destroy',':ALMACEN_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'almacen'=>'form']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent

    {{-- INI script ajax json models --}}
    <script src="{{ asset("js/models/expediente/almacens/delete.js") }}"></script>
    {{-- FIN script ajax json models --}}

@endsection