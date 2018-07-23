@php ($class_N="")
@php ($class_username="")
@php ($class_laction="d-none d-sm-table-cell")
@php ($class_message="d-none d-md-table-cell")
@php ($class_ip="")
@php ($class_created_at="d-none d-lg-table-cell")
@php ($class_updated_at="d-none d-lg-table-cell")
@php ($class_action="nosort text-center")

<table width="100%" class="table {{-- table-striped table-hover --}} table-sm" id="table-data-loginouts">

    <thead>
        <tr>
            <th class="{{ $class_N }}">N</th>
            <th class="{{ $class_username }}">Username</th>
            <th class="{{ $class_laction or ''}}">Action</th>
            <th class="{{ $class_message or ''}}">Message</th>
            <th class="{{ $class_ip or ''}}">IP</th>
            <th class="{{ $class_created_at or ''}}">Creado</th>
            {{-- <th class="{{ $class_updated_at or '' }}">Actualizado</th> --}}
            <th align="right" class="{{$class_action}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($loginouts as $loginout)

            @php ($user = $loginout->user)

            <tr data-loginout="{{$loginout->id or ''}}" data-user="{{$user->id or ''}}" class="table-{{ $loginout->tipo or '' }} p-0 m-0">

                <td>
                    {{ ($loop->index + 1) }}
                </td>
                <td>
                    {{$user->username or ''}}
                </td>

                <td  id="td-loginouts-action-{{$loginout->id or ''}}" title="{{ $loginout->action or ''}} " class="{{ $class_laction or ''}}">
                    {{$loginout->action or ''}}
                </td>

                <td  id="td-loginouts-message-{{$loginout->id or ''}}" title="{{ $loginout->message or ''}}"  class="{{ $class_message or ''}}">
                    {{$loginout->message or ''}}
                </td>

                <td  id="td-loginouts-ip-{{$loginout->id or ''}}" title="{{ $loginout->ip or ''}} " class="{{ $class_ip or ''}}">
                    {{$loginout->ip or ''}}
                </td>

                <td id="td-loginouts-created_at-{{ $loginout->id or ''}}" class="{{ $class_created_at or ''}}">
                    {{ (isset($loginout->created_at)) ? Carbon\Carbon::parse($loginout->created_at)->format('d-m-Y') : '' }}
                </td>

                {{-- boton para mostrar en un modal de info de regsitro --}}

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $loginout->id }}" class="text-center">

                    <div class="btn-group btn-group-sm ">

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('loginouts.show',$loginout->id) }}">
                            <i class="fas fa-info"></i>
                        </a>

                        {{-- 
                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $loginout->id }}" href="{{ route('loginouts.edit',$loginout->id) }}" id="btn-edituser_{{$loginout->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($loginout->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('loginouts.destroy',$loginout->id) }}" id="btn-delete-taskid_{{$loginout->id}}">
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
            $('#table-data-loginouts').DataTable( {
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