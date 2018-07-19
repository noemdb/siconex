@extends ('auth.layouts.login')

@section ('content')

    <form class="form-signin" method="POST" action="{{ route('login') }}">

        {{ csrf_field() }}

        <center>

            {{-- <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72"> --}}
            <img class="mb-4" src="{{ asset('images/brand/lg/4.png') }}" alt="" width="72" height="72">

            <h2 class="form-signin-heading">Datos de Acceso</h2>

        </center>

        <div class="form-label-group">
            <input type="text" id="inputUser" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}" required>
            <label for="inputUser">Nombre de Usuario</label>


            @if ($errors->has('username'))

                <span class="invalid-feedback">
                    <strong>{{ $errors->first('username') }}</strong>
                </span>

            @endif

        </div>

        <div class="form-label-group">

            <input type="password" id="inputPassword" name="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="Contraseña" required>
            <label for="inputPassword">Contraseña</label>

            @if ($errors->has('password'))

                <div class="invalid-feedback" style="width: 100%;">
                    <span class="help-block">
                        <strong>{{ $errors->first('password') }}</strong>
                    </span>
                </div>

            @endif

        </div>

        <div class="checkbox mb-2" align="right">

            <label>
                <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Recordarme
            </label>

        </div>

        @component('elements.widgets.button')
            @slot('type','submit')
            @slot('value','Ingresar')
            @slot('class','primary btn-block')
        @endcomponent

        <br>
        <a class="btn-link" href="{{ route('password.request') }}">
            Olvidaste tu Contraseña?
        </a>

    </form>

@endsection
