@extends('common.layouts.dashboard.app')

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10">

        <div class="card card-primary">
            <div class="card-header">
                <h3>
                    Listados de Alertas Registradas<br>
                    <small class="text-default">
                        <strong><span id="alert_counter">{{$alerts->count()}}</span> Alertas</strong>
                    </small>

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">

                        @include('common.alerts.menus.index')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h3>
            </div>

            <div class="card-body p-1">

                {{-- Mensaje session-flash sobre operaciones con base de datos --}}
                @include('common.elements.messeges.oper_ok')

                {{-- Partial con el listado de los usuarios --}}
                @include('common.alerts.table.list')

            </div>
        </div>
    </main>

    {!! Form::open(['route' => ['alerts.destroy',':ALERT_ID'], 'method' => 'DELETE', 'id'=>'form-delete', 'alert'=>'form']) !!}
    {!! Form::close() !!}

@endsection

@section('scripts')
    @parent

    {{-- INI script ajax json models --}}
    <script src="{{ asset("js/models/alerts/delete.js") }}"></script>
    {{-- FIN script ajax json models --}}

@endsection