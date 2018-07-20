<div class="card bd-callout bd-callout-{{ $class_form_create_task or 'form' }}">
  <div class="card-header">
    Formulario para el Registro de Nuevo Tarea.
  </div>
  <div class="card-body">

      {{-- <form> --}}
      {!! Form::open(['route' => 'tasks.store', 'method' => 'POST', 'id'=>'form-task-create-'. (isset($user->id)? $user->id : 'create')]) !!}

          @if(isset($user->id))

            {{ Form::hidden('user_id', $user->id) }}

          @else

            <div class="form-label-group pb-1">

                {!! Form::select('user_id',$user_list,old('user_id'),['class' => 'form-conttask','placeholder' => 'Usuario']); !!}
                {{-- <label for="is_active">{{ trans('validation.attributes.is_active') }}</label> --}}

            </div>

          @endif

          {{-- partial con el formulario y campos --}}
          @include('admin.tasks.forms.fields')

          <button type="submit" class="btn-task-create btn btn-primary btn-block" value="create" data-user="{{$user->id or 'create'}}">
              <span class="glyphicon glyphicon-save" aria-hidden="true"></span>
              Registrar
          </button>
          <button type="reset" class="btn-task-reset btn btn-info btn-block" value="Reset">
              <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
              Reset
          </button>

      {!! Form::close() !!}
      {{-- </form> --}}

  </div>
</div>