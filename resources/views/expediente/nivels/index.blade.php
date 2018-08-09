@extends('expediente.layouts.dashboard.app')

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10">

        <div class="card mt-2 bd-callout bd-callout-primary">
            <div class="card-header">
                <h3>
                    Listados de niveles registrados<br>
                    <small class="text-default">
                        <strong><span id="nivel_counter">{{$nivels->count()}}</span> niveles</strong>
                    </small>

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">
                        @include('expediente.nivels.menus.index')
                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="card-body p-1">

                {{-- Mensaje session-flash sobre operaciones con base de datos --}}
                @include('expediente.elements.messeges.oper_ok')

                {{-- Partial con el listado de los usuarios --}}
                @include('expediente.nivels.table.list')

            </div>
        </div>
    </main>

    {!! Form::open(['route' => ['nivels.destroy',':NIVEL_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'nivel'=>'form']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent

    {{-- INI script ajax json models --}}
    <script src="{{ asset("js/models/expediente/nivels/delete.js") }}"></script>
    {{-- FIN script ajax json models --}}

@endsection