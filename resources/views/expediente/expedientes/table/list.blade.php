@php
    $class=[
        'N'=>'',
        'estudiante_id'=>'',
        'codigo'=>'',
        'almacen'=>'',
        'descripcion'=>'d-none d-md-table-cell',
        'observacion'=>'d-none d-md-table-cell',
        'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-lg-table-cell',
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-hover table-sm" id="table-data-estudiantes">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['estudiante_id'] or ''}}">Estudiante</th>
            <th class="{{ $class['codigo'] or ''}}">Código</th>
            <th class="{{ $class['almacen'] or ''}}">almacen</th>
            <th class="{{ $class['descripcion'] or ''}}">Descripción</th>
            <th class="{{ $class['observacion'] or ''}}">Observación</th>
            <th class="{{ $class['created_at'] or ''}}">Creado</th>
            {{-- <th class="{{ $class['updated_at'] or '' }}">Actualizado</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($expedientes as $expediente)


            <tr data-expediente="{{$expediente->id}}" data-expediente="{{$expediente->id or ''}}" class="text-{{ $estado->class or '' }} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-expedientes-estudiante_id-{{ $expediente->id or '' }}" class="{{ $class['estudiante_id'] or ''}}">
                    {{$expediente->estudiante->fullname or ''}}
                </td>

                <td id="td-expedientes-codigo-{{ $expediente->id or '' }}" class="{{ $class['codigo'] or ''}}">
                    {{$expediente->codigo or ''}}
                </td>

                @php ($almacen = '')
                @if($expediente->movimientos->count()>0)
                    @php ($almacen = $expediente->movimientos->last()->nivel->almacen->nombre)
                    {{-- @php ($almacen = $expediente->movimientos) --}}
                @endif
                <td  id="td-expedientes-almacen-{{$expediente->id or ''}}" class="text-center text-uppercase {{ $class['almacen'] or ''}}">
                    {{$almacen or ''}}
                </td>

                <td id="td-expedientes-descripcion-{{$expediente->descripcion or ''}}" class="{{ $class['descripcion'] or ''}}">
                    {{$expediente->descripcion or ''}}
                </td>

                <td id="td-expedientes-observacion-{{$expediente->observacion or ''}}" class="{{ $class['observacion'] or ''}}">
                    {{$expediente->observacion or ''}}
                </td>

                <td id="td-expedientes-created_at-{{ $expediente->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($expediente->created_at)) ? Carbon\Carbon::parse($expediente->created_at)->format('d.m.Y') : '' }}
                </td>

                {{-- <td id="td-estudiantes-updated_at-{{ $expediente->id or ''}}" class="{{ $class['updated_at'] or ''}}">
                    {{ (isset($expediente->updated_at)) ? Carbon\Carbon::parse($expediente->updated_at)->format('d-m-Y') : '' }}
                </td> --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $expediente->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('expedientes.show',$expediente->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $expediente->id }}" href="{{ route('estudiantes.edit',$expediente->id) }}" id="btn-edituser_{{$expediente->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($expediente->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('estudiantes.destroy',$expediente->id) }}" id="btn-delete-taskid_{{$expediente->id}}">
                            <i class="fas fa-trash"></i>
                        </a>

                    </div>

                </td>

            </tr>
        @endforeach
    </tbody>
</table>

@section('stylesheet')
    @parent

    <link rel="stylesheet" href="{{ asset('vendor/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.css') }}">

@endsection

@section('scripts')
    @parent

    <script src="{{ asset("vendor/datatables/DataTables-1.10.16/js/jquery.dataTables.js") }}"></script>
    <script src="{{ asset("vendor/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.js") }}"></script>

   <script type="text/javascript" class="init">

        $(document).ready(function() {
            $('#table-data-estudiantes').DataTable( {
                "pageLength": 10,
                "responsive": false,
                // "searching": false,
                "columnDefs": [ {
                    "targets": 'nosort',
                    "orderable": false
                } ],
                "language": {
                    "url": "{{ asset("vendor/datatables/lang/spanish.json") }}"
                },
                // "dom": '<"top"ifl>rt<"bottom"p><"clear">',
            } );
        } );

   </script>

@endsection