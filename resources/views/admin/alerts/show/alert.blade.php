@isset($alert)


    <div class="card bd-callout bd-callout-{{ $alert->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Usuario</th>

                <th scope="col">

                    <span class="text-users-username-{{ $alert->user->id  or ''}}">
                        {{$alert->user->username or ''}}
                    </span>

                </th>
            </tr>
            <tr>
                <th scope="row">Destino</th>
                <td id="text-alerts-destino_user_id-{{ $alert->id  or ''}}">
                    @php ($dusername = $user->getUsernameId($alert->destino_user_id))
                    {{$dusername or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Mensaje</th>
                <td id="text-alerts-mensaje-{{ $alert->id  or ''}}">
                    {{$alert->mensaje or ''}}  
                </td>
            </tr>

            {{-- 
            <tr>
                <th scope="row">Tipo</th>
                <td id="text-alerts-tipo-{{ $alert->id  or ''}}">
                    {{$alert->tipo or ''}}  
                </td>
            </tr> 
            --}}

            <tr>
                <th scope="row">Estado</th>
                <td id="text-alerts-estado-{{ $alert->id  or ''}}" class="text-uppercase">
                    {{$alert->estado or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha Inicial</th>
                <td id="text-alerts-finicial-{{ $alert->id  or ''}}">
                    @if(isset($alert->finicial))
                        {{ (isset($alert->finicial)) ? Carbon\Carbon::parse($alert->finicial)->format('d-m-Y') : '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha Final</th>
                <td id="text-alerts-ffinal-{{ $alert->id  or ''}}">
                    @if(isset($alert->ffinal))
                        {{ (isset($alert->ffinal)) ? Carbon\Carbon::parse($alert->ffinal)->format('d-m-Y') : '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($alert->created_at))
                        {{$alert->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    @if(isset($alert->updated_at))
                        {{$alert->updated_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

          </tbody>

        </table>


      </div>
    </div>



@endisset