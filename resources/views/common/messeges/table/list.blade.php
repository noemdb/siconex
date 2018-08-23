@php
    $class=[
        'N'=>'',
        'user_id'=>'',
        'destino_user_id'=>'d-none d-md-table-cell',
        'mensaje'=>'',
        // 'tipo'=>'d-none d-md-table-cell',
        'estado'=>'d-none d-md-table-cell',
        'created_at'=>'d-none d-lg-table-cell',
        // 'updated_at'=>'d-none d-lg-table-cell'
        'btn_accion'=>'nosort',
    ];
@endphp

<table width="100%" class="table {{-- table-striped table-hover --}} table-sm" id="table-data-messeges">
    <thead>
        <tr>
            <th class="{{ $class['N'] or ''}}">N</th>
            <th class="{{ $class['user_id'] or ''}}">Usuario</th>
            <th class="{{ $class['destino_user_id'] or ''}}">Destino</th>
            <th class="{{ $class['mensaje'] or ''}}">Mensaje</th>
            {{-- <th class="{{ $class['tipo'] or ''}}">Tipo</th> --}}
            <th class="{{ $class['estado'] or ''}}">Estado</th>
            <th class="{{ $class['created_at'] or ''}}">Creado</th>
            {{-- <th class="{{ $class['updated_at'] or '' }}">F.Final</th> --}}
            <th align="right" class="{{ $class['btn_accion'] or ''}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($messeges as $messege)

            @php ($user = $messege->user)

            <tr data-messege="{{$messege->id}}" data-user="{{$user->id or ''}}" class="text-{{ $messege->class or '' }} p-0 m-0">

                <td class="{{ $class['N'] or ''}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-users-username-{{ $user->id or '' }}" class="{{ $class['user_id'] or ''}}">
                    <span class="text-users-username-{{ $user->id or '' }} text-{{ $user->is_active or '' }}">
                        {{$user->username or ''}}
                    </span>
                </td>

                @php ($dusername = $user->getUsernameId($messege->destino_user_id))
                <td id="td-messeges-destino_user_id-{{$messege->destino_user_id or ''}}" class="{{ $class['destino_user_id'] or ''}}">
                    {{$dusername or ''}}
                </td>

                <td  id="td-messeges-mensaje-{{$messege->id or ''}}" title="{{ $messege->mensaje or ''}}" class="{{ $class['mensaje'] or ''}}">
                    {{$messege->truncmensaje}}
                </td>

                {{-- <td  id="td-messeges-tipo-{{$messege->id or ''}}" title="{{ $messege->tipo or ''}}"  class="text-uppercase {{ $class['tipo'] or ''}}"> --}}
                    {{-- {{$messege->tipo or ''}} --}}
                {{-- </td> --}}

                <td  id="td-messeges-estado-{{$messege->id or ''}}" title="{{ $messege->estado or ''}}"  class="text-uppercase {{ $class['estado'] or ''}}">
                    {{$messege->estado or ''}}
                </td>

                <td id="td-messeges-created_at-{{ $messege->id or ''}}" class="{{ $class['created_at'] or ''}}">
                    {{ (isset($messege->created_at)) ? Carbon\Carbon::parse($messege->created_at)->format('d-m-Y') : '' }}
                </td>
{{-- 
                <td id="td-messeges-updated_at-{{ $messege->id or ''}}" class="{{ $class['updated_at'] or ''}}">
                    {{ (isset($messege->updated_at)) ? Carbon\Carbon::parse($messege->updated_at)->format('d-m-Y') : '' }}
                </td>
 --}}
                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $messege->id }}" class="text-center">

                    <div class="btn-group btn-group-sm">

                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('messeges.show',$messege->id) }}">
                            <i class="{{$icon_menus['info']}}"></i>
                        </a>

                        {{-- <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $messege->id }}" href="{{ route('messeges.edit',$messege->id) }}" id="btn-edituser_{{$messege->id}}"> --}}
                            {{-- <i class="fas fa-pencil-alt"></i> --}}
                        {{-- </a> --}}

                        {{-- <a title="Eliminar {{(isset($messege->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('messeges.destroy',$messege->id) }}" id="btn-delete-taskid_{{$messege->id}}"> --}}
                            {{-- <i class="fas fa-trash"></i> --}}
                        {{-- </a> --}}

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
            $('#table-data-messeges').DataTable( {
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