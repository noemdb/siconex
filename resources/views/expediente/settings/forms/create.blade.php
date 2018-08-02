<div class="card bd-callout bd-callout-{{ $class_form_create_task or 'form' }}">
  <div class="card-header font-weight-bold">
    Formulario para el Registro de un nuevo Setting.
  </div>
  <div class="card-body p-1">

      {{-- <form> --}}
      {!! Form::open(['route' => 'settings.store', 'method' => 'POST', 'id'=>'form-setting-create-'. (isset($user->id)? $user->id : 'create')]) !!}    

          {{-- partial con el formulario y campos --}}
          @include('admin.settings.forms.fields')

          <button type="submit" class="btn-setting-create btn btn-primary btn-block" value="create" data-user="{{$user->id or 'create'}}">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar
          </button>
          <button type="reset" class="btn-setting-reset btn btn-info btn-block" value="Reset">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              Reset
          </button>

      {!! Form::close() !!}
      {{-- </form> --}}

  </div>
</div>