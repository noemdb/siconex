@isset($almacen)


    <div class="card bd-callout bd-callout-{{ $almacen->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Nombre</th>

                <th scope="col">
                    {{$almacen->nombre or ''}}
                </th>
            </tr>
            <tr>
                <th scope="row">Responsable</th>
                <td>
                    {{$almacen->responsable}}
                </td>
            </tr>

            <tr>
                <th scope="row">Descripción</th>
                <td>
                    {{$almacen->descripcion}}
                </td>
            </tr>

            <tr>
                <th scope="row">Dirección</th>
                <td>
                    {{$almacen->direccion}}
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($almacen->created_at))
                        {{$almacen->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    @if(isset($almacen->updated_at))
                        {{$almacen->updated_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

          </tbody>

        </table>


      </div>
    </div>



@endisset