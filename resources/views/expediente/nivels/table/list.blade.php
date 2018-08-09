@php
    $class=[
        'N'=>'',
        'almacen_id'=>'',
        'codigo'=>'',
        'descripcion'=>'d-none d-md-table-cell',
        'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-xl-table-cell',
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-hover table-sm" id="table-data-nivels">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['almacen_id'] or ''}}">Almacen</th>
            <th class="{{ $class['codigo'] or ''}}">Código</th>
            <th class="{{ $class['descripcion'] or ''}}">Descripción</th>
            <th class="{{ $class['created_at'] or ''}}">Creado</th>
            {{-- <th class="{{ $class['updated_at'] or '' }}">Actualizado</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($nivels as $nivel)

            {{-- @php ($estado = $nivel->estados->last()) --}}
            <tr data-nivel="{{$nivel->id}}" class="{{-- text-{{ $estado->class or '' }} --}} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-nivels-almacen_id-{{ $nivel->id or '' }}" class="{{ $class['almacen_id'] or ''}}">
                    {{$nivel->almacen->nombre or ''}}
                </td>

                <td id="td-nivels-codigo-{{ $nivel->id or '' }}" class="{{ $class['codigo'] or ''}}">
                    {{$nivel->codigo or ''}}
                </td>

                <td id="td-nivels-descripcion-{{$nivel->descripcion or ''}}" class="{{ $class['descripcion'] or ''}}">
                    {{$nivel->descripcion or ''}}
                </td>

                <td id="td-nivels-created_at-{{ $nivel->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($nivel->created_at)) ? Carbon\Carbon::parse($nivel->created_at)->format('d.m.Y') : '' }}
                </td>

                {{-- <td id="td-nivels-updated_at-{{ $nivel->id or ''}}" class="{{ $class['updated_at'] or ''}}"> --}}
                    {{-- {{ (isset($nivel->updated_at)) ? Carbon\Carbon::parse($nivel->updated_at)->format('d-m-Y') : '' }} --}}
                {{-- </td> --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $nivel->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('nivels.show',$nivel->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $nivel->id }}" href="{{ route('nivels.edit',$nivel->id) }}" id="btn-edituser_{{$nivel->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($nivel->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('nivels.destroy',$nivel->id) }}" id="btn-delete-taskid_{{$nivel->id}}">
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
            $('#table-data-nivels').DataTable( {
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