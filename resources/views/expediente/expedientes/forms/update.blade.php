<div class="card bd-callout bd-callout-{{ Session::get('class_oper') or "" }}">
  <div class="card-header font-weight-bold">
    Formulario para la actualización del expediente <span class="text-primary">{{ $expediente->codigo or '' }}</span>
  </div>
  <div class="card-body p-1">

      {{-- INI form --}}
      {!! Form::model($expediente,['route' => ['expedientes.update', $expediente->id], 'method' => 'PUT', 'id'=>'form-update-task_'.$expediente->id, 'taske'=>'form']) !!}

            {{-- partial con el formulario y campos --}}
            @include('expediente.expedientes.forms.fields')

            <button type="submit" class="btn-user-update btn btn-primary btn-block" value="update" data-id="update" id="btn-update-expediente-{{$expediente->id}}">

                <i class="{{$icon_menus['guardado']}}"></i>
                Actualizar Expediente

            </button>

            {{-- INI Menu modelos realcionados --}}
            {{-- <div class="btn-group d-flex pt-2" style="width: 100%;" taske="group" aria-label="Basic example">

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