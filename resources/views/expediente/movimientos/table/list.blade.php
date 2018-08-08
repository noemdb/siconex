@php
    $class=[
        'N'=>'',
        'expediente_id'=>'',
        'user_id'=>'d-none d-lg-table-cell',
        'nivel_id'=>'',
        'almacen'=>'',
        'descripcion'=>'d-none d-md-table-cell',
        'observacion'=>'d-none d-lg-table-cell',
        // 'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-xl-table-cell',
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-hover table-sm" id="table-data-movimientos">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['expediente_id'] or ''}}">Expediente</th>
            <th class="{{ $class['user_id'] or ''}}">Usuario</th>
            <th class="{{ $class['nivel_id'] or ''}}">Nivel</th>
            <th class="{{ $class['almacen'] or ''}}">Almacen</th>
            <th class="{{ $class['descripcion'] or ''}}">Descripción</th>
            <th class="{{ $class['observacion'] or ''}}">Observación</th>
            {{-- <th class="{{ $class['created_at'] or ''}}">Creado</th> --}}
            {{-- <th class="{{ $class['updated_at'] or '' }}">Actualizado</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($movimientos as $movimiento)

            {{-- @php ($estado = $movimiento->estados->last()) --}}
            <tr data-movimiento="{{$movimiento->id}}" data-movimiento="{{$movimiento->id or ''}}" class="{{-- text-{{ $estado->class or '' }} --}} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-movimientos-expediente_id-{{ $movimiento->id or '' }}" class="{{ $class['expediente_id'] or ''}}">
                    {{$movimiento->expediente->codigo or ''}}
                </td>

                <td id="td-movimientos-user_id-{{ $movimiento->id or '' }}" class="{{ $class['user_id'] or ''}}">
                    {{$movimiento->user->username or ''}}
                </td>
                <td id="td-movimientos-nivel_id-{{ $movimiento->id or '' }}" class="{{ $class['nivel_id'] or ''}}">
                    {{$movimiento->nivel_id or ''}}
                </td>
                <td id="td-movimientos-almacen-{{ $movimiento->id or '' }}" class="{{ $class['almacen'] or ''}}">
                    {{$movimiento->nivel->almacen->nombre or ''}}
                </td>

                <td id="td-movimientos-descripcion-{{$movimiento->descripcion or ''}}" class="{{ $class['descripcion'] or ''}}">
                    {{$movimiento->descripcion or ''}}
                </td>

                <td id="td-movimientos-observacion-{{$movimiento->observacion or ''}}" class="{{ $class['observacion'] or ''}}">
                    {{ $movimiento->observacion or ''}}
                </td>

                {{-- <td id="td-movimientos-created_at-{{ $movimiento->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($movimiento->created_at)) ? Carbon\Carbon::parse($movimiento->created_at)->format('d-m-Y') : '' }}
                </td> --}}

                {{-- <td id="td-movimientos-updated_at-{{ $movimiento->id or ''}}" class="{{ $class['updated_at'] or ''}}"> --}}
                    {{-- {{ (isset($movimiento->updated_at)) ? Carbon\Carbon::parse($movimiento->updated_at)->format('d-m-Y') : '' }} --}}
                {{-- </td> --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $movimiento->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('movimientos.show',$movimiento->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $movimiento->id }}" href="{{ route('movimientos.edit',$movimiento->id) }}" id="btn-edituser_{{$movimiento->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($movimiento->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('movimientos.destroy',$movimiento->id) }}" id="btn-delete-taskid_{{$movimiento->id}}">
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
            $('#table-data-movimientos').DataTable( {
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