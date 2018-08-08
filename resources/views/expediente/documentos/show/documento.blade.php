@isset($documento)

    <div class="card bd-callout bd-callout-{{ $documento->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>
                <th scope="col">Expediente</th>
                <th scope="col">
                    {{$documento->expediente->codigo or ''}}
                </th>
            </tr>

            <tr>
                <th scope="col">Tipo</th>
                <td>
                    {{$documento->tipo or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Descripción</th>
                <td>
                    {{$documento->descripcion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Observación</th>
                <td>
                    {{$documento->observacion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Original</th>
                <td>
                    {{$documento->original or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Copia</th>
                <td>
                    {{$documento->copia or ''}}
                </th>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($documento->created_at))
                        {{$documento->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            @if(isset($documento->updated_at))
            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    {{$documento->updated_at->format('d-m-Y h:m:s')}}
                </td>
            </tr>
            @endif

          </tbody>

        </table>

      </div>

    </div>

@endisset