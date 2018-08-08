<div class="card bd-callout bd-callout-{{ $class_form_create_task or 'form' }}">
  <div class="card-header font-weight-bold">
    Formulario para el registro de un nuevo Movimiento.
  </div>
  <div class="card-body">

      {{-- <form> --}}
      {!! Form::open(['route' => 'movimientos.store', 'method' => 'POST', 'id'=>'form-movimiento-create']) !!}

          {{-- partial con el formulario y campos --}}
          @include('expediente.movimientos.forms.fields')

          <button type="submit" class="btn-movimiento-create btn btn-primary btn-block" value="create" data-user="{{$user->id or 'create'}}">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar
          </button>
          <button type="reset" class="btn-movimiento-reset btn btn-info btn-block" value="Reset">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              Reset
          </button>

      {!! Form::close() !!}
      {{-- </form> --}}

  </div>
</div>