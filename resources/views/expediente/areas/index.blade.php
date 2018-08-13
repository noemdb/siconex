@extends('expediente.layouts.dashboard.app')

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10">

        <div class="card mt-2 bd-callout bd-callout-primary">
            <div class="card-header">
                <h3>
                    Listados de áreas registradas<br>
                    <small class="text-default">
                        <strong><span id="area_counter">{{$areas->count()}}</span> áreas</strong>
                    </small>

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">
                        @include('expediente.areas.menus.index')
                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="card-body p-1">

                {{-- Mensaje session-flash sobre operaciones con base de datos --}}
                @include('expediente.elements.messeges.oper_ok')

                {{-- Partial con el listado de los usuarios --}}
                @include('expediente.areas.table.list')

            </div>
        </div>
    </main>

    {!! Form::open(['route' => ['areas.destroy',':AREA_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'area'=>'form']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent

    {{-- INI script ajax json models --}}
    <script src="{{ asset("js/models/expediente/areas/delete.js") }}"></script>
    {{-- FIN script ajax json models --}}

@endsection