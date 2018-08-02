@isset($estudiante)


    <div class="card bd-callout bd-callout-{{ $estudiante->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Usuario</th>

                <th scope="col">

                    <span class="text-users-username-{{ $estudiante->user->id  or ''}}">
                        {{$estudiante->user->username or ''}}
                    </span>

                </th>
            </tr>
            <tr>
                <th scope="row">Destino</th>
                <td id="text-estudiantes-destino_user_id-{{ $estudiante->id  or ''}}">
                    @php ($dusername = $user->getUsernameId($estudiante->destino_user_id))
                    {{$dusername or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Mensaje</th>
                <td id="text-estudiantes-mensaje-{{ $estudiante->id  or ''}}">
                    {{$estudiante->mensaje or ''}}  
                </td>
            </tr>

            {{-- 
            <tr>
                <th scope="row">Tipo</th>
                <td id="text-estudiantes-tipo-{{ $estudiante->id  or ''}}">
                    {{$estudiante->tipo or ''}}  
                </td>
            </tr> 
            --}}

            <tr>
                <th scope="row">Estado</th>
                <td id="text-estudiantes-estado-{{ $estudiante->id  or ''}}" class="text-uppercase">
                    {{$estudiante->estado or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha Inicial</th>
                <td id="text-estudiantes-finicial-{{ $estudiante->id  or ''}}">
                    @if(isset($estudiante->finicial))
                        {{ (isset($estudiante->finicial)) ? Carbon\Carbon::parse($estudiante->finicial)->format('d-m-Y') : '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha Final</th>
                <td id="text-estudiantes-ffinal-{{ $estudiante->id  or ''}}">
                    @if(isset($estudiante->ffinal))
                        {{ (isset($estudiante->ffinal)) ? Carbon\Carbon::parse($estudiante->ffinal)->format('d-m-Y') : '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($estudiante->created_at))
                        {{$estudiante->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    @if(isset($estudiante->updated_at))
                        {{$estudiante->updated_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

          </tbody>

        </table>


      </div>
    </div>



@endisset