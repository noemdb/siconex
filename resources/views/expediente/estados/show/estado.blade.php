@isset($estado)

    <div class="card bd-callout bd-callout-{{ $estado->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>
                <th scope="col">Estudiante</th>
                <th scope="col">
                    {{$estado->estudiante->fullname or ''}}
                </th>
            </tr>
            <tr>
                <th scope="col">Estado</th>
                <th scope="col">
                    {{$estado->estado or ''}}
                </th>
            </tr>
            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($estado->created_at))
                        {{$estado->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            @if(isset($estado->updated_at))
            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    {{$estado->updated_at->format('d-m-Y h:m:s')}}
                </td>
            </tr>
            @endif
          </tbody>
        </table>

      </div>

    </div>

@endisset