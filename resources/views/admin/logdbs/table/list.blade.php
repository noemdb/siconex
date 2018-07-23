@php ($class_N="")
@php ($class_username="")
@php ($class_laction="d-none d-sm-table-cell")
@php ($class_model_class="")
@php ($class_ip="")
@php ($class_created_at="d-none d-lg-table-cell")
@php ($class_updated_at="d-none d-lg-table-cell")
@php ($class_action="nosort text-center")

<table width="100%" class="table {{-- table-striped table-hover --}} table-sm" id="table-data-logdbs">

    <thead>
        <tr>
            <th class="{{ $class_N }}">N</th>
            <th class="{{ $class_username }}">Username</th>
            <th class="{{ $class_laction or ''}}">Action</th>
            <th class="{{ $class_model_class or ''}}">Model Class</th>
            <th class="{{ $class_ip or ''}}">IP</th>
            <th class="{{ $class_created_at or ''}}">Creado</th>
            {{-- <th class="{{ $class_updated_at or '' }}">Actualizado</th> --}}
            <th align="right" class="{{$class_action}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($logdbs as $logdb)

            @php ($user = $logdb->user)

            <tr data-logdb="{{$logdb->id or ''}}" data-user="{{$user->id or ''}}" class="table-{{ $logdb->tipo or '' }} p-0 m-0">

                <td>
                    {{ ($loop->index + 1) }}
                </td>
                <td>
                    {{$user->username or ''}}
                </td>

                <td  id="td-logdbs-action-{{$logdb->id or ''}}" title="{{ $logdb->action or ''}} " class="{{ $class_laction or ''}}">
                    {{$logdb->action or ''}}
                </td>

                <td  id="td-logdbs-model_class-{{$logdb->id or ''}}" title="{{ $logdb->model_class or ''}}"  class="{{ $class_model_class or ''}}">
                    {{$logdb->model_class or ''}}
                </td>

                <td  id="td-logdbs-ip-{{$logdb->id or ''}}" title="{{ $logdb->ip or ''}} " class="{{ $class_ip or ''}}">
                    {{$logdb->ip or ''}}
                </td>

                <td id="td-logdbs-created_at-{{ $logdb->id or ''}}" class="{{ $class_created_at or ''}}">
                    {{ (isset($logdb->created_at)) ? Carbon\Carbon::parse($logdb->created_at)->format('d-m-Y') : '' }}
                </td>

                {{-- boton para mostrar en un modal de info de regsitro --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $logdb->id }}" class="text-center">

                    <div class="btn-group btn-group-sm ">

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('logdbs.show',$logdb->id) }}">
                            <i class="fas fa-info"></i>
                        </a>

                        {{-- 
                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $logdb->id }}" href="{{ route('logdbs.edit',$logdb->id) }}" id="btn-edituser_{{$logdb->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($logdb->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('logdbs.destroy',$logdb->id) }}" id="btn-delete-taskid_{{$logdb->id}}">
                            <i class="fas fa-trash"></i>
                        </a> 
                        --}}

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
            $('#table-data-logdbs').DataTable( {
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