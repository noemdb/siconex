@php ($class_N="")
@php ($class_duser="d-none d-lg-table-cell")
{{-- @php ($class_tipo="d-none d-xl-table-cell") --}}
{{-- @php ($class_evento="d-none d-xl-table-cell") --}}
@php ($class_estado="d-none d-xl-table-cell")
@php ($class_finicial="d-none d-xl-table-cell")
@php ($class_ffinal="d-none d-xl-table-cell")
@php ($class_created_at="d-none d-md-table-cell")
@php ($class_updated_at="d-none d-lg-table-cell")
@php ($class_action="nosort text-center")

<table width="100%" class="table {{-- table-striped table-hover --}} table-sm" id="table-data-alerts">
    <thead>
        <tr>
            <th class="{{ $class_N }}">N</th>
            <th>Usuario</th>
            <th class="{{ $class_duser or ''}}">Destino</th>
            <th class="">Mensaje</th>
            <th class="{{ $class_estado or ''}}">Estado</th>
            <th class="{{ $class_finicial or ''}}">F.Inicial</th>
            <th class="{{ $class_ffinal or '' }}">F.Final</th>
            <th align="right" class="{{$class_action}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($alerts as $alert)

            @php ($user = $alert->user)

            <tr data-alert="{{$alert->id}}" data-user="{{$user->id or ''}}" class="table-{{ $alert->tipo or '' }} p-0 m-0">

                <td>
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-users-username-{{ $user->id or '' }}">
                    {{$user->username or ''}}
                </td>

                @php ($dusername = $user->getUsernameId($alert->destino_user_id))
                <td  id="td-alerts-destino_user_id-{{$alert->id or ''}}" title="{{ $dusername or ''}} " class="{{ $class_duser or ''}}">
                    {{$dusername or ''}}
                </td>

                <td  id="td-alerts-mensaje-{{$alert->id or ''}}" title="{{ $alert->mensaje or ''}} ">
                    {{$alert->truncmensaje}}
                </td>

                <td  id="td-alerts-estado-{{$alert->id or ''}}" title="{{ $alert->estado or ''}}"  class="text-uppercase {{ $class_estado or ''}}">
                    {{$alert->estado or ''}}
                </td>

                <td id="td-alerts-finicial-{{ $alert->id or ''}}" class="{{ $class_finicial or ''}}">
                    {{ (isset($alert->finicial)) ? Carbon\Carbon::parse($alert->finicial)->format('d-m-Y') : '' }}
                </td>

                <td id="td-alerts-ffinal-{{ $alert->id or ''}}" class="{{ $class_ffinal or ''}}">
                    {{ (isset($alert->ffinal)) ? Carbon\Carbon::parse($alert->ffinal)->format('d-m-Y') : '' }}
                </td>

                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $alert->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('alerts.show',$alert->id) }}">
                            <i class="fas fa-info"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $alert->id }}" href="{{ route('alerts.edit',$alert->id) }}" id="btn-edituser_{{$alert->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($alert->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('alerts.destroy',$alert->id) }}" id="btn-delete-taskid_{{$alert->id}}">
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
            $('#table-data-alerts').DataTable( {
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