@isset($expediente)


    <div class="card bd-callout bd-callout-{{ $expediente->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Nombre</th>

                <th scope="col">
                    {{$expediente->fullname or ''}}
                </th>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>
                    {{$expediente->email}}
                </td>
            </tr>

            @php ($estado = $expediente->estados->last())
            <tr>
                <th scope="row">Estado</th>
                <td id="text-estudiantes-estado-{{ $expediente->id  or ''}}" class="text-uppercase text-{{$estado->class or ''}}">
                    {{$estado->estado or ''}}
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