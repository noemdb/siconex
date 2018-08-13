@isset($area)

    <div class="card bd-callout bd-callout-{{ $area->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>

            <tr>
                <th scope="col">Almacen</th>
                <td scope="col">
                    {{$area->almacen->nombre or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Código</th>
                <td scope="col">
                    {{$area->codigo or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Descripción</th>
                <td>
                    {{$area->descripcion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Descripción</th>
                <td>
                    {{$area->descripcion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($area->created_at))
                        {{$area->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            @if(isset($area->updated_at))
            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    {{$area->updated_at->format('d-m-Y h:m:s')}}
                </td>
            </tr>
            @endif

          </tbody>

        </table>

      </div>

    </div>

@endisset