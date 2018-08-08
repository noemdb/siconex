@isset($expediente)


    <div class="card bd-callout bd-callout-{{ $expediente->tipo or 'info' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Estudiante</th>

                <th scope="col">
                    {{$expediente->estudiante->fullname or ''}}
                </th>
            </tr>
            <tr>
                <th scope="row">Codigo</th>
                <td>
                    {{$expediente->codigo or ''}}
                </td>
            </tr>

            <tr>
                <th scope="row">Descripción</th>
                <td>
                    {{$expediente->descripcion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="row">Observación</th>
                <td>
                    {{$expediente->observacion or ''}}
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($expediente->created_at))
                        {{$expediente->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    @if(isset($expediente->updated_at))
                        {{$expediente->updated_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

          </tbody>

        </table>


      </div>
    </div>



@endisset