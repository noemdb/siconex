@isset($movimiento)

    <div class="card bd-callout bd-callout-{{ $movimiento->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>
                <th scope="col">Expediente</th>
                <th scope="col">
                    {{$movimiento->expediente->codigo or ''}}
                </th>
            </tr>

            <tr>
                <th scope="col">Tipo</th>
                <td>
                    {{$movimiento->tipo or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Descripción</th>
                <td>
                    {{$movimiento->descripcion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Observación</th>
                <td>
                    {{$movimiento->observacion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Original</th>
                <td>
                    {{$movimiento->original or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Copia</th>
                <td>
                    {{$movimiento->copia or ''}}
                </th>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($movimiento->created_at))
                        {{$movimiento->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            @if(isset($movimiento->updated_at))
            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    {{$movimiento->updated_at->format('d-m-Y h:m:s')}}
                </td>
            </tr>
            @endif

          </tbody>

        </table>

      </div>

    </div>

@endisset