<div class="card bd-callout bd-callout-{{ $class_form_create_task or 'form' }}">
  <div class="card-header font-weight-bold">
    Formulario para el registro de un nuevo Almacen.
  </div>
  <div class="card-body">

      {{-- <form> --}}
      {!! Form::open(['route' => 'almacens.store', 'method' => 'POST', 'id'=>'form-almacen-create']) !!}    

          {{-- partial con el formulario y campos --}}
          @include('expediente.almacens.forms.fields')

          <button type="submit" class="btn-almacen-create btn btn-primary btn-block" value="create" data-user="{{$user->id or 'create'}}">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar
          </button>
          <button type="reset" class="btn-almacen-reset btn btn-info btn-block" value="Reset">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              Reset
          </button>

      {!! Form::close() !!}
      {{-- </form> --}}

  </div>
</div>