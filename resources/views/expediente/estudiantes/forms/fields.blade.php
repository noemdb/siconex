@include('expediente.elements.forms.errors')

@include('expediente.elements.messeges.oper_ok')

<div class="form-label-group pb-1">
    {!! Form::text('firstname', old('firstname'), ['class' => 'form-control','placeholder'=>'1er Nombre de Usuario','id'=>'firstname','required','autofocus']); !!}
    {{-- <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}"> --}}
    <label for="firstname">1er Nombre del Estudiante</label>

</div>

<div class="form-label-group pb-1">
    {!! Form::text('lastname', old('lastname'), ['class' => 'form-control','placeholder'=>'2dp Nombre de Usuario','id'=>'lastname','required','autofocus']); !!}
    {{-- <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}"> --}}
    <label for="lastname">2do Nombre del Estudiante</label>

</div>

<div class="form-label-group pb-1">
    {!! Form::text('ci', old('ci'), ['class' => 'form-control','placeholder'=>'CI','id'=>'ci','required','autofocus']); !!}
    {{-- <input type="text" id="username" name="username" class="form-control{{ $errors->has('username') ? ' is-invalid' : '' }}" placeholder="Nombre de Usuario" value="{{ old('username') }}"> --}}
    <label for="ci">CI</label>

</div>

<div class="form-label-group pb-1">

    {!! Form::text('email', old('email'), ['class' => 'form-control','id'=>'email','placeholder'=>'Email']); !!}
    {{-- <input type="text" id="email" name="email" class="form-control{{ $errors->has('email') ? ' is-invalid ' : '' }}" placeholder="Email" value="{{ old('email') }}"> --}}
    <label for="email">Email del Estudiante</label>

</div>

@section('stylesheet')
    @parent

    <link href="{{ asset('css/floating-labels.css') }}" rel="stylesheet">

    <link href="{{ asset('vendor/bootstrap-datepicker/1.6.4/css/bootstrap-datepicker3.css') }}" rel="stylesheet">

@endsection