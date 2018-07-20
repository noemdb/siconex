@isset($task)

    <table class="table table-striped table-bordered {{-- table-sm table-hover --}}">
      <tbody>
        <tr>

            <th scope="col">Usuario</th>

            <th scope="col">

                <span class="text-users-username-{{ $user->id  or ''}}">
                    {{$user->username or ''}}
                </span>

            </th>
        </tr>
        <tr>
            <th scope="row">Tarea</th>
            <td>
                <span class="text-tasks-task-{{ $task->id  or ''}}">
                    {{$task->task}}
                </span>
            </td>
        </tr>
        <tr>
          <th scope="row">Rango</th>
          <td>

            <span class="text-tasks-rango-{{ $task->id  or ''}}">
                {{$task->rango}}
            </span>

          </td>
        </tr>
        <tr>
          <th scope="row">Descripción</th>
          <td>

            <span class="text-tasks-descripcion-{{ $task->id  or ''}}">
                {{$task->descripcion}}
            </span>

          </td>
        </tr>
        <tr>
            <th scope="row">Fecha Inicial</th>
            <td>
                <span class="text-tasks-finicial-{{ $task->id  or ''}}">
                    @if(isset($task->finicial))
                        {{ (isset($task->finicial)) ? Carbon\Carbon::parse($task->finicial)->format('d-m-Y') : '' }}
                        {{-- {{$task->finicial->format('d-m-Y')}} --}}
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <th scope="row">Fecha Final</th>
            <td>
                <span class="text-tasks-ffinal-{{ $task->id  or ''}}">
                    @if(isset($task->ffinal))
                        {{ (isset($task->ffinal)) ? Carbon\Carbon::parse($task->ffinal)->format('d-m-Y') : '' }}
                        {{-- {{$task->ffinal->format('d-m-Y')}} --}}
                    @endif
                </span>
            </td>
        </tr>
        <tr>
            <th scope="row">Creado</th>
            <td>
                @if(isset($task->created_at))
                    {{$task->created_at->format('d-m-Y h:m:s')}}
                @endif
            </td>
        </tr>
        <tr>
            <th scope="row">Actualizado</th>
            <td>
                @if(isset($task->updated_at))
                    {{$task->updated_at->format('d-m-Y h:m:s')}}
                @endif
            </td>
        </tr>
{{--         <tr>
            <th scope="row" colspan="2">
                <a class="btn btn-dark w-100" href="{{ route('tasks.edit',$task->id)}}" taske="button">
                    Actualizar
                    <i class="far fa-id-badge"></i>
                </a>
            </th>
        </tr> --}}
      </tbody>
    </table>

@endisset