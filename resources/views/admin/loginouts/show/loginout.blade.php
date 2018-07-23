@isset($loginout)

    <div class="card p-2 m-2 bd-callout bd-callout-{{ $loginout->tipo or '' }}">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>
                <th scope="col">Username</th>
                <th scope="col">
                    <span class="text-loginouts-user_id-{{ $loginout->id  or ''}}">
                        {{$loginout->user->username or ''}}
                    </span>
                </th>
            </tr>

            <tr>
                <th scope="col">Action</th>
                <th scope="col">
                    <span class="text-loginouts-action-{{ $loginout->id  or ''}}">
                        {{$loginout->action or ''}}
                    </span>
                </th>
            </tr>

            <tr>
                <th scope="col">Type</th>
                <th scope="col">
                    <span class="text-loginouts-tipo-{{ $loginout->id  or ''}} text text-{{$loginout->tipo or ''}} text-uppercase">
                        {{$loginout->tipo or ''}}
                    </span>
                </th>
            </tr>

            <tr>
                <th scope="row">Message</th>
                <td id="text-loginouts-message-{{ $loginout->id  or ''}}">
                    {{$loginout->message or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">IP</th>
                <td id="text-loginouts-ip-{{ $loginout->id  or ''}}" class="text-uppercase">
                    {{$loginout->ip or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Context</th>
                <td id="text-loginouts-context-{{ $loginout->id  or ''}}">
                    {{$loginout->context or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Extra</th>
                <td id="text-loginouts-extra-{{ $loginout->id  or ''}}">
                    {{$loginout->extra or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($loginout->created_at))
                        {{$loginout->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            {{--
            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    @if(isset($loginout->updated_at))
                        {{$loginout->updated_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr> 
            --}}

          </tbody>

        </table>


      </div>
    </div>



@endisset