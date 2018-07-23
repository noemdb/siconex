@php ($class_N="")
@php ($class_view="d-none d-sm-table-cell")
@php ($class_table="d-none d-md-table-cell")
@php ($class_name="")
@php ($class_value="")
@php ($class_created_at="d-none d-lg-table-cell")
@php ($class_updated_at="d-none d-lg-table-cell")
@php ($class_action="nosort text-center")

<table width="100%" class="table {{-- table-striped table-hover --}} table-sm" id="table-data-selectopts">

    <thead>
        <tr>
            <th class="{{ $class_N }}">N</th>
            <th class="{{ $class_view or ''}}">Vista</th>
            <th class="{{ $class_table or ''}}">Tabla</th>
            <th class="{{ $class_name or ''}}">Nombre</th>
            <th class="{{ $class_value or ''}}">Valor</th>
            <th class="{{ $class_created_at or ''}}">Creado</th>
            <th class="{{ $class_updated_at or '' }}">Actualizado</th>
            <th align="right" class="{{$class_action}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($selectopts as $selectopt)

            @php ($user = $selectopt->user)

            <tr data-selectopt="{{$selectopt->id or ''}}" data-user="{{$user->id or ''}}" class="table-{{ $selectopt->tipo or '' }} p-0 m-0">

                <td>
                    {{ ($loop->index + 1) }}
                </td>

                <td  id="td-selectopts-view-{{$selectopt->id or ''}}" title="{{ $selectopt->view or ''}} " class="{{ $class_view or ''}}">
                    {{$selectopt->view or ''}}
                </td>

                <td  id="td-selectopts-table-{{$selectopt->id or ''}}" title="{{ $selectopt->table or ''}}"  class="{{ $class_table or ''}}">
                    {{$selectopt->table or ''}}
                </td>

                <td  id="td-selectopts-name-{{$selectopt->id or ''}}" title="{{ $selectopt->name or ''}} " class="{{ $class_name or ''}}">
                    {{$selectopt->name or ''}}
                </td>

                <td  id="td-selectopts-value-{{$selectopt->id or ''}}" title="{{ $selectopt->value or ''}}"  class="{{ $class_value or ''}}">
                    {{$selectopt->value or ''}}
                </td>

                <td id="td-selectopts-created_at-{{ $selectopt->id or ''}}" class="{{ $class_created_at or ''}}">
                    {{ (isset($selectopt->created_at)) ? Carbon\Carbon::parse($selectopt->created_at)->format('d-m-Y') : '' }}
                </td>

                <td id="td-selectopts-updated_at-{{ $selectopt->id or ''}}" class="{{ $class_updated_at or ''}}">
                    {{ (isset($selectopt->updated_at)) ? Carbon\Carbon::parse($selectopt->updated_at)->format('d-m-Y') : '' }}
                </td>

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $selectopt->id }}" class="text-center">

                    <div class="btn-group btn-group-sm ">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('selectopts.show',$selectopt->id) }}">
                            <i class="fas fa-info"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $selectopt->id }}" href="{{ route('selectopts.edit',$selectopt->id) }}" id="btn-edituser_{{$selectopt->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($selectopt->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('selectopts.destroy',$selectopt->id) }}" id="btn-delete-taskid_{{$selectopt->id}}">
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
            $('#table-data-selectopts').DataTable( {
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