@php
    $class=[
        'N'=>'',
        'fullname'=>'',
        'email'=>'d-none d-md-table-cell',
        'estado'=>'d-none d-md-table-cell',
        'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-lg-table-cell'
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-sm" id="table-data-estudiantes">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['fullname'] or ''}}">Nombre</th>
            <th class="{{ $class['email'] or ''}}">Email</th>
            {{-- <th class="{{ $class['estado'] or ''}}">Estado</th> --}}
            <th class="{{ $class['created_at'] or ''}}">Creado</th>
            {{-- <th class="{{ $class['updated_at'] or '' }}">F.Final</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($estudiantes as $estudiante)

            @php ($estado = $estudiante->estados->last())
            <tr data-estudiante="{{$estudiante->id}}" data-estudiante="{{$estudiante->id or ''}}" class="table-{{ $estado->estado or '' }} p-0 m-0 alert-{{$estado->class or ''}}">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-estudiantes-{{ $estudiante->id or '' }}" class="{{ $class['fullname'] or ''}}">
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

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $estudiante->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('estudiantes.show',$estudiante->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $estudiante->id }}" href="{{ route('estudiantes.edit',$estudiante->id) }}" id="btn-edituser_{{$estudiante->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($estudiante->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('estudiantes.destroy',$estudiante->id) }}" id="btn-delete-taskid_{{$estudiante->id}}">
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