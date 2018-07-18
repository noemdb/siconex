@extends('admin.layouts.dashboard.app')

@section('main')

    <main role="main" class="col-md-10 ml-sm-auto col-lg-10 px-4">
        
        <div class="card bd-callout bd-callout-primary mt-2 ">

            <div class="card-header">
                
                <h2>

                    Nuevos Perfiles

                        {{-- INI Menu rapido --}}
                        <div class="btn-group float-right">

                            @include('admin.elements.buttons.user-index')

                            @include('admin.elements.buttons.profile-index')

                            @include('admin.elements.buttons.rol-index') 

                            @include('admin.elements.buttons.goback')      

                            @include('admin.elements.buttons.url-refresh')

                        </div>
                        {{-- FIN Menu rapido --}}

                </h2>

            </div>

            <div class="card-body">

                @include('admin.profiles.forms.create')

            </div>

        </div>

    </main>

@endsection

@section('scripts')
    @parent

    {{-- <script src="{{ asset("js/models/users/create.js") }}"></script> --}}

@endsection