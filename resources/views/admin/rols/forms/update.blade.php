<div class="card bd-callout bd-callout-{{ Session::get('class_oper') }}">
  <div class="card-header">
    Formulario para la actualización del rol del usuario <strong>{{ $user->username or '' }}</strong>
  </div>
  <div class="card-body">

      {{-- INI form --}}
      {!! Form::model($rol,['route' => ['rols.update', $rol->id], 'method' => 'PUT', 'id'=>'form-update-rol_'.$rol->id, 'role'=>'form']) !!}
            
            {{-- partial con el formulario y campos --}}
            @include('admin.rols.forms.fields')

            <button type="submit" class="btn-user-update btn btn-primary btn-block" value="update" data-id="update" id="btn-update-rol-{{$rol->id}}">

                <i class="far fa-save"></i>
                Actualizar Rol

            </button>

            {{-- INI Menu modelos realcionados --}}
            <div class="btn-group d-flex pt-2" style="width: 100%;" role="group" aria-label="Basic example">
              
              <a class="btn btn-dark w-100" href="{{ route('users.show',$user->id) }}" role="button">
                Mostrar
                <i class="fas fa-user"></i>
              </a>

              <a class="btn btn-secondary w-100" href="{{ isset($user->id) ? route('users.edit',$user->id) : route('users.create')}}" role="button">
                {{ isset($user->id) ? 'Actualizar' : 'Crear'}}
                <i class="far fa-user"></i> 
              </a>

              <a class="btn btn-secondary w-100" href="{{ ($profile->count() > 0) ? route('profiles.edit',$profile->id) : route('profiles.create')}}" role="button">
                {{ ($profile->count() > 0) ? 'Actualizar' : 'Crear'}}
                <i class="far fa-id-card"></i>
              </a>

            </div>
            {{-- FIN Menu modelos realcionados --}}

      {!! Form::close() !!}    
      {{-- FIN form --}}

  </div>
</div>