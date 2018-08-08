@php
    $class=[
        'N'=>'',
        'expediente_id'=>'',
        'tipo'=>'',
        'descripcion'=>'d-none d-md-table-cell',
        'observacion'=>'d-none d-lg-table-cell',
        'original'=>'d-none d-md-table-cell',
        'copia'=>'d-none d-lg-table-cell',
        // 'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-xl-table-cell',
        'btn_accion'=>'nosort text-center',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-hover table-sm" id="table-data-documentos">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['expediente_id'] or ''}}">Expediente</th>
            <th class="{{ $class['tipo'] or ''}}">Tipo</th>
            <th class="{{ $class['descripcion'] or ''}}">Descripción</th>
            <th class="{{ $class['observacion'] or ''}}">Observación</th>
            <th class="{{ $class['original'] or ''}}">Original</th>
            <th class="{{ $class['copia'] or ''}}">Copia</th>
            {{-- <th class="{{ $class['created_at'] or ''}}">Creado</th> --}}
            {{-- <th class="{{ $class['updated_at'] or '' }}">Actualizado</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($documentos as $documento)

            {{-- @php ($estado = $documento->estados->last()) --}}
            <tr data-documento="{{$documento->id}}" data-documento="{{$documento->id or ''}}" class="{{-- text-{{ $estado->class or '' }} --}} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-documentos-expediente_id-{{ $documento->id or '' }}" class="{{ $class['expediente_id'] or ''}}">
                    {{$documento->expediente->codigo or ''}}
                </td>

                <td id="td-documentos-tipo-{{ $documento->id or '' }}" class="{{ $class['tipo'] or ''}}">
                    {{$documento->tipo or ''}}
                </td>

                <td id="td-documentos-descripcion-{{$documento->descripcion or ''}}" class="{{ $class['descripcion'] or ''}}">
                    {{$documento->descripcion or ''}}
                </td>

                <td id="td-documentos-observacion-{{$documento->observacion or ''}}" class="{{ $class['observacion'] or ''}}">
                    {{ $documento->observacion or ''}}
                </td>

                <td id="td-documentos-original-{{$documento->original or ''}}" class="{{ $class['original'] or ''}}">
                    {{ $documento->original or ''}}
                </td>

                <td id="td-documentos-copia-{{$documento->copia or ''}}" class="{{ $class['copia'] or ''}}">
                    {{ $documento->copia or ''}}
                </td>

                {{-- <td id="td-documentos-created_at-{{ $documento->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($documento->created_at)) ? Carbon\Carbon::parse($documento->created_at)->format('d-m-Y') : '' }}
                </td> --}}

                {{-- <td id="td-documentos-updated_at-{{ $documento->id or ''}}" class="{{ $class['updated_at'] or ''}}"> --}}
                    {{-- {{ (isset($documento->updated_at)) ? Carbon\Carbon::parse($documento->updated_at)->format('d-m-Y') : '' }} --}}
                {{-- </td> --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $documento->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('documentos.show',$documento->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $documento->id }}" href="{{ route('documentos.edit',$documento->id) }}" id="btn-edituser_{{$documento->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($documento->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('documentos.destroy',$documento->id) }}" id="btn-delete-taskid_{{$documento->id}}">
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
            $('#table-data-documentos').DataTable( {
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