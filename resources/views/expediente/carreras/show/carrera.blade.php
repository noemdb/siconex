@isset($carrera)


    <div class="card bd-callout bd-callout-{{ $carrera->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Estudiante</th>

                <th scope="col">
                    {{$carrera->estudiante->fullname or ''}}
                </th>
            </tr>
            <tr>

                <th scope="col">Nombre</th>

                <th scope="col">
                    {{$carrera->nombre or ''}}
                </th>
            </tr>
            <tr>
                <th scope="row">Período de Adminisión</th>
                <td>
                    {{$carrera->padminsion}}
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha de Ingeso</th>
                <td>
                    {{$carrera->fingreso}}
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha de Egreso</th>
                <td>
                    {{$carrera->fegreso}}
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha Congelar</th>
                <td>
                    {{$carrera->fcongelar}}
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha Descongelar</th>
                <td>
                    {{$carrera->fdescongelar}}
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