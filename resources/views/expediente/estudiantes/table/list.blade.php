@php
    $class=[
        'N'=>'',
        'fullname'=>'',
        'ci'=>'',
        'email'=>'d-none d-md-table-cell',
        'estado'=>'d-none d-md-table-cell',
        'created_at'=>'d-none d-lg-table-cell',
        'updated_at'=>'d-none d-lg-table-cell',
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-hover table-sm" id="table-data-estudiantes">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['ci'] or ''}}">CI</th>
            <th class="{{ $class['fullname'] or ''}}">Nombre</th>
            <th class="{{ $class['email'] or ''}}">Email</th>
            {{-- <th class="{{ $class['estado'] or ''}}">Estado</th> --}}
            <th class="{{ $class['created_at'] or ''}}">Creado</th>
            <th class="{{ $class['updated_at'] or '' }}">Actualizado</th>
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($estudiantes as $estudiante)

            @php ($estado = $estudiante->estados->last())
            <tr data-estudiante="{{$estudiante->id}}" data-estudiante="{{$estudiante->id or ''}}" class="text-{{ $estado->class or '' }} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-estudiantes-ci-{{ $estudiante->id or '' }}" class="{{ $class['ci'] or ''}}">
                    {{$estudiante->ci or ''}}
                </td>

                <td id="td-estudiantes-fullname-{{ $estudiante->id or '' }}" class="{{ $class['fullname'] or ''}}">
                    {{$estudiante->fullname or ''}}
                </td>

                <td id="td-estudiantes-email-{{$estudiante->email or ''}}" class="{{ $class['email'] or ''}}">
                    {{$estudiante->email or ''}}
                </td>

                {{-- <td  id="td-estudiantes-estado-{{$estudiante->id or ''}}" class="text-center text-uppercase {{ $class['estado'] or ''}}">                     --}}
                    {{-- {{$estado->estado or ''}} --}}
                {{-- </td> --}}

                <td id="td-estudiantes-created_at-{{ $estudiante->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($estudiante->created_at)) ? Carbon\Carbon::parse($estudiante->created_at)->format('d-m-Y') : '' }}
                </td>

                <td id="td-estudiantes-updated_at-{{ $estudiante->id or ''}}" class="{{ $class['updated_at'] or ''}}">
                    {{ (isset($estudiante->updated_at)) ? Carbon\Carbon::parse($estudiante->updated_at)->format('d-m-Y') : '' }}
                </td>

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $estudiante->id }}" class="text-center">

                    <div class="dropdown dropleft">
                        <button class="btn btn-info dropdown-toggle btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="{{$icon_menus['opcion']}}"></i>
                        </button>
                        <div class="dropdown-menu text-center" aria-labelledby="dropdownMenuButton">

                            <div class="btn-group btn-group-sm">

                                <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('estudiantes.show',$estudiante->id) }}">
                                    <i class="{{$icon_menus['info']}}"></i>
                                </a>
                                <a title="Adicionar Expediente" class="btn btn-primary btn-xs" href="#{{-- {{ route('movimientos.createId',$expediente->id) }} --}}">
                                    <i class="{{$icon_menus['expediente']}}"></i>
                                </a>
                                <a title="Adicionar Carrera" class="btn btn-success btn-xs" href="#{{-- {{ route('movimientos.createId',$expediente->id) }} --}}">
                                    <i class="{{$icon_menus['carrera']}}"></i>
                                </a>
                                <a title="Cambiar Estado" class="btn btn-secondary btn-xs" href="#{{-- {{ route('movimientos.createId',$expediente->id) }} --}}">
                                    <i class="{{$icon_menus['estado']}}"></i>
                                </a>

                                <a title="Editar resgistro" class=" btn btn-warning btn-xs btn-edit-{{ $estudiante->id }}" href="{{ route('estudiantes.edit',$estudiante->id) }}" id="btn-edituser_{{$estudiante->id}}">
                                    <i class="{{$icon_menus['editar']}}"></i>
                                </a>

                                <a title="Eliminar {{(isset($estudiante->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn btn-danger btn-xs btn-delete btn btn-danger btn-xs" href="{{ route('estudiantes.destroy',$estudiante->id) }}" id="btn-delete-taskid_{{$estudiante->id}}">
                                    <i class="{{$icon_menus['eliminar']}}"></i>
                                </a>

                            </div>

                        </div>

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