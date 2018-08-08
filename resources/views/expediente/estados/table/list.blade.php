@php
    $class=[
        'N'=>'',
        'estudiante_id'=>'',
        'estado'=>'',
        'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-xl-table-cell',
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-hover table-sm" id="table-data-estados">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['estudiante_id'] or ''}}">Estudiante</th>
            <th class="{{ $class['estado'] or ''}}">Estado</th>
            <th class="{{ $class['created_at'] or ''}}">Creado</th>
            {{-- <th class="{{ $class['updated_at'] or '' }}">Actualizado</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($estados as $estado)

            {{-- @php ($estado = $estado->estados->last()) --}}
            <tr data-estado="{{$estado->id}}" class="{{-- text-{{ $estado->class or '' }} --}} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-estados-estudiante_id-{{ $estado->id or '' }}" class="{{ $class['estudiante_id'] or ''}}">
                    {{$estado->estudiante->fullname or ''}}
                </td>

                <td id="td-estados-estado-{{ $estado->id or '' }}" class="{{ $class['estado'] or ''}}">
                    {{$estado->estado or ''}}
                </td>

                <td id="td-estados-created_at-{{ $estado->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($estado->created_at)) ? Carbon\Carbon::parse($estado->created_at)->format('d-m-Y') : '' }}
                </td>

                {{-- <td id="td-estados-updated_at-{{ $estado->id or ''}}" class="{{ $class['updated_at'] or ''}}">
                    {{ (isset($estado->updated_at)) ? Carbon\Carbon::parse($estado->updated_at)->format('d-m-Y') : '' }}
                </td> --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $estado->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('estados.show',$estado->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $estado->id }}" href="{{ route('estados.edit',$estado->id) }}" id="btn-edituser_{{$estado->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($estado->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('estados.destroy',$estado->id) }}" id="btn-delete-taskid_{{$estado->id}}">
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
            $('#table-data-estados').DataTable( {
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