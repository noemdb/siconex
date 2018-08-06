@isset($carrera)


    <div class="card bd-callout bd-callout-{{ $carrera->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Nombre</th>

                <th scope="col">
                    {{$carrera->nombre or ''}}
                </th>
            </tr>
            <tr>
                <th scope="row">Responsable</th>
                <td>
                    {{$carrera->responsable}}
                </td>
            </tr>

            <tr>
                <th scope="row">Descripción</th>
                <td>
                    {{$carrera->descripcion}}
                </td>
            </tr>

            <tr>
                <th scope="row">Dirección</th>
                <td>
                    {{$carrera->direccion}}
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($carrera->created_at))
                        {{$carrera->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    @if(isset($carrera->updated_at))
                        {{$carrera->updated_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

          </tbody>

        </table>


      </div>
    </div>



@endisset