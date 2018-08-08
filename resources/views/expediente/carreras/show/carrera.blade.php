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
                    @if(isset($carrera->fingreso))
                        {{ (isset($carrera->fingreso)) ? Carbon\Carbon::parse($carrera->fingreso)->format('d-m-Y') : '' }}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Fecha de Egreso</th>
                <td>
                    @if(isset($carrera->fegreso))
                        {{ (isset($carrera->fegreso)) ? Carbon\Carbon::parse($carrera->fegreso)->format('d-m-Y') : '' }}
                    @endif
                </td>
            </tr>

            @if(isset($carrera->fcongelar))
            <tr>
                <th scope="row">Fecha Congelar</th>
                <td>
                    {{ (isset($carrera->fcongelar)) ? Carbon\Carbon::parse($carrera->fcongelar)->format('d-m-Y') : '' }}
                </td>
            </tr>
            @endif

            @if(isset($carrera->fdescongelar))
            <tr>
                <th scope="row">Fecha Descongelar</th>
                <td>
                    {{ (isset($carrera->fdescongelar)) ? Carbon\Carbon::parse($carrera->fdescongelar)->format('d-m-Y') : '' }}
                </td>
            </tr>
            @endif

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($carrera->created_at))
                        {{$carrera->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            @if(isset($carrera->updated_at))
            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    {{$carrera->updated_at->format('d-m-Y h:m:s')}}
                </td>
            </tr>
            @endif

          </tbody>

        </table>

      </div>

    </div>

@endisset