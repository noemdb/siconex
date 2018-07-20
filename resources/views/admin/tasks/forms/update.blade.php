<div class="card bd-callout bd-callout-{{ Session::get('class_oper') }}">
  <div class="card-header">
    Formulario para la actualización del task del usuario <strong>{{ $user->username or '' }}</strong>
  </div>
  <div class="card-body p-1">

      {{-- INI form --}}
      {!! Form::model($task,['route' => ['tasks.update', $task->id], 'method' => 'PUT', 'id'=>'form-update-task_'.$task->id, 'taske'=>'form']) !!}

            {{-- partial con el formulario y campos --}}
            @include('admin.tasks.forms.fields')

            <button type="submit" class="btn-user-update btn btn-primary btn-block" value="update" data-id="update" id="btn-update-task-{{$task->id}}">

                <i class="far fa-save"></i>
                Actualizar Tarea

            </button>

            {{-- INI Menu modelos realcionados --}}
            {{-- <div class="btn-group d-flex pt-2" style="width: 100%;" taske="group" aria-label="Basic example">

              <a class="btn btn-info w-100" href="{{ route('users.show',$user->id) }}" taske="button">
                Mostrar
                <i class="{{ $icon_menus['user'] or '' }}"></i>
              </a>

              <a class="btn btn-info w-100" href="{{ route('profiles.show',$profile->id) }}" taske="button">
                Mostrar
                <i class="{{ $icon_menus['profile'] or '' }}"></i>
              </a>

            </div> --}}
            {{-- FIN Menu modelos realcionados --}}

      {!! Form::close() !!}
      {{-- FIN form --}}

  </div>
</div>