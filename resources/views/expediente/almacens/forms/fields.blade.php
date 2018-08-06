@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

<div class="form-label-group pb-1">
    {!! Form::text('nombre', old('nombre'), ['class' => 'form-control','placeholder'=>'Nombre Almacen','id'=>'nombre','required','autofocus']); !!}
    {{-- <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}"> --}}
    <label for="nombre">Nombre</label>

</div>

<div class="form-label-group pb-1">
    {!! Form::text('responsable', old('responsable'), ['class' => 'form-control','placeholder'=>'Nombre Responsable','id'=>'responsable','required','autofocus']); !!}
    {{-- <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}"> --}}
    <label for="responsable">Responsable</label>

</div>

<div class="form-label-group pb-1">
    {{-- {!! Form::textarea('descripcion', old('descripcion'), ['class' => 'form-control','required', 'size' => '40x2','placeholder'=>'Descripción']); !!}     --}}

    {!! Form::text('descripcion', old('descripcion'), ['class' => 'form-control','placeholder'=>'Descripción','id'=>'descripcion','autofocus']); !!}
    <label for="descripcion">Descripción</label>

</div>

<div class="form-label-group pb-1">

    {!! Form::text('direccion', old('direccion'), ['class' => 'form-control','id'=>'direccion','placeholder'=>'Dirección']); !!}
    {{-- <input type="text" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid ' : '' }}" placeholder="Email" value="{{ old('email') }}"> --}}
    <label for="direccion">Dirección</label>

</div>

@section('stylesheet')
    @parent

    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css') }}" rel="stylesheet">

@endsection