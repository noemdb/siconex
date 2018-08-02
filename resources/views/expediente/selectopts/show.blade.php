@extends('admin.layouts.dashboard.app')

{{-- @section('page_heading','Listado de Usuarios') --}}

@section('main')

    <main taske="main" class="col-md-10 ml-sm-auto col-lg-10 px-2">

        <div class="card mt-2 bd-callout bd-callout-info">

            <div class="card-header">

                <h2>

                    Información del SelectOpt

                    {{-- INI Menu rapido --}}
                    <div class="btn-group float-right pt-2">

                        @include('admin.selectopts.menus.show')

                    </div>
                    {{-- FIN Menu rapido --}}

                </h2>

            </div>



            <div class="card-body p-1">

                <div class="container p-1">

                    <div class="row">

                        <div class="col-sm-12">

                            {{-- Partial con los tabs de usuario (perfiles, Select Opts) --}}

                            @include('admin.selectopts.show.selectopt')

                        </div>
                    </div>

                </div>

            </div>

        </div>

    </main>

@endsection