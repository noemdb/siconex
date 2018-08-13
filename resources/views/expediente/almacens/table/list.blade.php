@php
    $class=[
        'N'=>'',
        'nombre'=>'',
        'responsable'=>'',
        'descripcion'=>'d-none d-md-table-cell',
        'direccion'=>'d-none d-md-table-cell',
        'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-xl-table-cell',
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-hover table-sm" id="table-data-almacens">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['nombre'] or ''}}">Nombre</th>
            <th class="{{ $class['responsable'] or ''}}">Responsable</th>
            <th class="{{ $class['direccion'] or ''}}">Dirección</th>
            {{-- <th class="{{ $class['estado'] or ''}}">Estado</th> --}}
            <th class="{{ $class['created_at'] or ''}}">Creado</th>
            {{-- <th class="{{ $class['updated_at'] or '' }}">Actualizado</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($almacens as $almacen)

            {{-- @php ($estado = $almacen->estados->last()) --}}
            <tr data-almacen="{{$almacen->id}}" data-almacen="{{$almacen->id or ''}}" class="{{-- text-{{ $estado->class or '' }} --}} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-almacens-{{ $almacen->id or '' }}" class="{{ $class['nombre'] or ''}}">
                    {{$almacen->nombre or ''}}
                </td>

                <td id="td-almacens-{{ $almacen->id or '' }}" class="{{ $class['responsable'] or ''}}">
                    {{$almacen->responsable or ''}}
                </td>

                <td id="td-almacens-direccion-{{$almacen->direccion or ''}}" class="{{ $class['direccion'] or ''}}">
                    {{$almacen->direccion or ''}}
                </td>


                {{-- <td  id="td-almacens-estado-{{$almacen->id or ''}}" class="text-center text-uppercase {{ $class['estado'] or ''}}">                     --}}
                    {{-- {{$estado->estado or ''}} --}}
                {{-- </td> --}}

                <td id="td-almacens-created_at-{{ $almacen->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($almacen->created_at)) ? Carbon\Carbon::parse($almacen->created_at)->format('d-m-Y') : '' }}
                </td>

                {{-- <td id="td-almacens-updated_at-{{ $almacen->id or ''}}" class="{{ $class['updated_at'] or ''}}"> --}}
                    {{-- {{ (isset($almacen->updated_at)) ? Carbon\Carbon::parse($almacen->updated_at)->format('d-m-Y') : '' }} --}}
                {{-- </td> --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $almacen->id }}" class="text-center">

                    <div class="dropdown dropleft">
                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="{{$icon_menus['opcion']}}"></i>
                        </button>
                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">

                            <div class="btn-group btn-group-sm">

                                <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('almacens.show',$almacen->id) }}">
                                    <i class="{{$icon_menus['info']}}"></i>
                                </a>
                                <a title="Registrar Area" class="btn btn-primary btn-xs" href="#">
                                    <i class="{{$icon_menus['area']}}"></i>
                                </a>

                                <a title="Editar resgistro" class=" btn btn-warning btn-xs btn-edit-{{ $almacen->id }}" href="{{ route('almacens.edit',$almacen->id) }}" id="btn-edituser_{{$almacen->id}}">
                                    <i class="{{$icon_menus['editar']}}"></i>
                                </a>

                                <a title="Eliminar {{(isset($almacen->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn btn-danger btn-xs btn-delete btn btn-danger btn-xs" href="{{ route('almacens.destroy',$almacen->id) }}" id="btn-delete-taskid_{{$almacen->id}}">
                                    <i class="{{$icon_menus['eliminar']}}"></i>
                                </a>

                            </div>

                        </div>

                    </div>

{{--                     <div class="btn-group btn-group-sm">

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('almacens.show',$almacen->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $almacen->id }}" href="{{ route('almacens.edit',$almacen->id) }}" id="btn-edituser_{{$almacen->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($almacen->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('almacens.destroy',$almacen->id) }}" id="btn-delete-taskid_{{$almacen->id}}">
                            <i class="fas fa-trash"></i>
                        </a>

                    </div> --}}

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
            $('#table-data-almacens').DataTable( {
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