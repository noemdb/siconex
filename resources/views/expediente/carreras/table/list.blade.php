@php
    $class=[
        'N'=>'',
        'estudiante_id'=>'',
        'nombre'=>'',
        'padminsion'=>'d-none d-md-table-cell',
        'fegreso'=>'d-none d-md-table-cell',
        'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-xl-table-cell',
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-hover table-sm" id="table-data-carreras">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['estudiante_id'] or ''}}">Estudiante</th>
            <th class="{{ $class['nombre'] or ''}}">Nombre</th>
            <th class="{{ $class['padminsion'] or ''}}">Período Adm.</th>
            <th class="{{ $class['fingreso'] or ''}}">F.Ingreso</th>
            <th class="{{ $class['created_at'] or ''}}">Creado</th>
            {{-- <th class="{{ $class['updated_at'] or '' }}">Actualizado</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($carreras as $carrera)

            {{-- @php ($estado = $carrera->estados->last()) --}}
            <tr data-carrera="{{$carrera->id}}" data-carrera="{{$carrera->id or ''}}" class="{{-- text-{{ $estado->class or '' }} --}} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-carreras-estudiante_id-{{ $carrera->id or '' }}" class="{{ $class['estudiante_id'] or ''}}">
                    {{$carrera->estudiante->fullname or ''}} 
                </td>

                <td id="td-carreras-nombre-{{ $carrera->id or '' }}" class="{{ $class['nombre'] or ''}}">
                    {{$carrera->nombre or ''}} 
                </td>

                <td id="td-carreras-padminsion-{{$carrera->padminsion or ''}}" class="{{ $class['padminsion'] or ''}}">
                    {{$carrera->padminsion or ''}}
                </td>

                <td id="td-carreras-fingreso-{{$carrera->fingreso or ''}}" class="{{ $class['fingreso'] or ''}}">
                    {{ (isset($carrera->fingreso)) ? Carbon\Carbon::parse($carrera->fingreso)->format('d-m-Y') : '' }}
                </td>

                <td id="td-carreras-created_at-{{ $carrera->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($carrera->created_at)) ? Carbon\Carbon::parse($carrera->created_at)->format('d-m-Y') : '' }}
                </td>

                {{-- <td id="td-carreras-updated_at-{{ $carrera->id or ''}}" class="{{ $class['updated_at'] or ''}}"> --}}
                    {{-- {{ (isset($carrera->updated_at)) ? Carbon\Carbon::parse($carrera->updated_at)->format('d-m-Y') : '' }} --}}
                {{-- </td> --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $carrera->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('carreras.show',$carrera->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $carrera->id }}" href="{{ route('carreras.edit',$carrera->id) }}" id="btn-edituser_{{$carrera->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($carrera->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('carreras.destroy',$carrera->id) }}" id="btn-delete-taskid_{{$carrera->id}}">
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
            $('#table-data-carreras').DataTable( {
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