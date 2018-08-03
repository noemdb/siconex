@isset($estudiante)


    <div class="card bd-callout bd-callout-{{ $estudiante->tipo or '' }} p-2 m-2">

      <div class="card-body pt-1">

        <table class="table table-striped table-bordered {{-- table-hover --}}">
          <tbody>
            <tr>

                <th scope="col">Nombre</th>

                <th scope="col">
                    {{$estudiante->fullname or ''}}
                </th>
            </tr>
            <tr>
                <th scope="row">Email</th>
                <td>
                    {{$estudiante->email}}
                </td>
            </tr>

            @php ($estado = $estudiante->estados->last())
            <tr>
                <th scope="row">Estado</th>
                <td id="text-estudiantes-estado-{{ $estudiante->id  or ''}}" class="text-uppercase text-{{$estado->class or ''}}">
                    {{$estado->estado or ''}}  
                </td>
            </tr>

            <tr>
                <th scope="row">Creado</th>
                <td>
                    @if(isset($estudiante->created_at))
                        {{$estudiante->created_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

            <tr>
                <th scope="row">Actualizado</th>
                <td>
                    @if(isset($estudiante->updated_at))
                        {{$estudiante->updated_at->format('d-m-Y h:m:s')}}
                    @endif
                </td>
            </tr>

          </tbody>

        </table>


      </div>
    </div>



@endisset