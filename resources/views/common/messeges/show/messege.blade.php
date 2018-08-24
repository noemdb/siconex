@isset($messege)

    <div class="card bd-callout bd-callout-{{ $messege->TipClass or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Usuario</th>

                <th scope="col">

                    <span class="text-users-username-{{ $messege->user->id  or ''}}">
                        {{$messege->user->username or ''}}
                    </span>

                </th>
            </tr>
            <tr>
                <th scope="row">Destino</th>
                <td id="text-alerts-destino_user_id-{{ $messege->id  or ''}}">
                    @php ($dusername = $user->getUsernameId($messege->destino_user_id))
                    {{$dusername or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Mensaje</th>
                <td id="text-alerts-mensaje-{{ $messege->id  or ''}}">
                    {{$messege->mensaje or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Tipo</th>
                <td id="text-alerts-tipo-{{ $messege->id  or ''}}" class="text-uppercase text-{{ $messege->TipClass or '' }}">
                    {{$messege->tipo or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Estado</th>
                <td id="text-alerts-estado-{{ $messege->id  or ''}}" class="text-uppercase text-{{$messege->class or 'secondary'}}">
                    {{$messege->estado or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($messege->created_at))
                        {{$messege->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    @if(isset($messege->updated_at))
                        {{$messege->updated_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

          </tbody>

        </table>

      </div>

    </div>

@endisset