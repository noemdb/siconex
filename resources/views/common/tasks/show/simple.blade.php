@isset($task)

    <div class="card bd-callout bd-callout-{{ $task->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Usuario</th>

                <th scope="col">

                    <span class="text-users-username-{{ $task->user->id  or ''}}">
                        {{$task->user->username or ''}}
                    </span>

                </th>
            </tr>
            <tr>
                <th scope="row">Código</th>
                <td id="text-tasks-codigo-{{ $task->id  or ''}}">
                    {{$task->codigo or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Descripcion</th>
                <td id="text-tasks-descripcion-{{ $task->id  or ''}}">
                    {{$task->descripcion or ''}}  
                </td>
            </tr>

            {{-- 
            <tr>
                <th scope="row">Tipo</th>
                <td id="text-tasks-tipo-{{ $task->id  or ''}}">
                    {{$task->tipo or ''}}  
                </td>
            </tr> 
            --}}

            <tr>
                <th scope="row">Evento</th>
                <td id="text-tasks-evento-{{ $task->id  or ''}}">
                    {{$task->evento or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Estado</th>
                <td id="text-tasks-estado-{{ $task->id  or ''}}" class="text-uppercase text-{{$task->class  or 'secondary'}}">
                    {{$task->estado or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha Inicial</th>
                <td id="text-tasks-finicial-{{ $task->id  or ''}}">
                    @if(isset($task->finicial))
                        {{ (isset($task->finicial)) ? Carbon\Carbon::parse($task->finicial)->format('d-m-Y') : '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha Final</th>
                <td id="text-tasks-ffinal-{{ $task->id  or ''}}">
                    @if(isset($task->ffinal))
                        {{ (isset($task->ffinal)) ? Carbon\Carbon::parse($task->ffinal)->format('d-m-Y') : '' }}
                    @endif
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

          </tbody>

        </table>


      </div>
    </div>



@endisset