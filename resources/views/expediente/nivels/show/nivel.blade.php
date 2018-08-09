@isset($nivel)

    <div class="card bd-callout bd-callout-{{ $nivel->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>

            <tr>
                <th scope="col">Almacen</th>
                <td scope="col">
                    {{$nivel->almacen->nombre or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Código</th>
                <td scope="col">
                    {{$nivel->codigo or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Descripción</th>
                <td>
                    {{$nivel->descripcion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="col">Descripción</th>
                <td>
                    {{$nivel->descripcion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($nivel->created_at))
                        {{$nivel->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            @if(isset($nivel->updated_at))
            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    {{$nivel->updated_at->format('d-m-Y h:m:s')}}
                </td>
            </tr>
            @endif

          </tbody>

        </table>

      </div>

    </div>

@endisset