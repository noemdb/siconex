{{-- @php ($class_N="d-none d-sm-block") --}}
@php ($class_N="d-none d-md-block")
@php ($class_range="d-none d-lg-block")
@php ($class_name="")
@php ($class_finicial="")
@php ($class_ffinal="")
@php ($class_action="nosort")

<table width="100%" class="table table-striped table-hover table-sm" id="table-data-rols">
    <thead>
        <tr>
            <th class="{{ $class_N }}">N</th>
            <th>Usuario</th>
            <th>Rol</th>
            <th class="{{$class_range}}">Rango</th>
            <th class="hidden-xs hidden-sm">F.Inicial</th>
            <th class="hidden-xs hidden-sm">F.Final</th>
            <th align="right" class="{{$class_action}}"><strong>Aciones</strong></th>
        </tr>
    </thead>

    <tbody id="tdatos">

        @foreach($rols as $rol)

            @php ($user = $rol->user)
            @php ($profile = $rol->profile)
            
            <tr data-rol="{{$rol->id}}" data-user="{{$user->id or ''}}">

                <td class="{{$class_N}}">
                    {{ ($loop->index + 1) }}
                </td>

                <td id="td-users-username-{{ $user->id or '' }}">
                    <span class="text-users-username-{{ $user->id or '' }} text-{{ $user->is_active or '' }}">
                        {{$user->username or ''}}
                    </span>
                </td>

                <td  id="td-rols-rol-{{$rol->id or ''}}" title="{{ $rol->descripcion or ''}} ">
                    <span class="text-rols-rol-{{$rol->id}} rol-{{ $rol->rol or '' }}">
                        {{$rol->rol}}       
                    </span>
                </td>

                <td id="td-rols-rango-{{$rol->id or ''}}" class="{{$class_range}}">
                    <span class="text-rols-rango-{{$rol->id}} rol-{{ $rol->rango or '' }}">
                        {{$rol->rango}}
                    </span>
                </td>

                <td id="td-rols-finicial-{{ $rol->id or ''}}" class="{{$class_finicial}}">
                    <span class="text-rols-finicial-{{$rol->id}}">
                        {{ (isset($rol->finicial)) ? Carbon\Carbon::parse($rol->finicial)->format('d-m-Y') : '' }}
                    </span>
                </td>

                <td id="td-rols-ffinal-{{ $rol->id or ''}}" class="{{$class_ffinal}}">
                    <span class="text-rols-ffinal-{{$rol->id}}">
                        {{ (isset($rol->ffinal)) ? Carbon\Carbon::parse($rol->ffinal)->format('d-m-Y') : '' }}
                    </span>
                </td>


                <td style="padding: 2px; vertical-align: middle;" id="btn-action-{{ $rol->id }}">



                    <div class="btn-group btn-group-sm">
                    
                        {{-- boton para mostrar en un modal de info de regsitro --}}

                        <a title="Mostrar detalles" class="btn btn-info btn-xs" href="{{ route('rols.show',$rol->id) }}">
                            <i class="fas fa-info"></i>
                        </a>

                        <a title="Editar resgistro" class="btn btn-warning btn-xs btn-action-group-{{ $rol->id }}" href="{{ route('rols.edit',$rol->id) }}" id="btn-edituser_{{$rol->id}}">
                            <i class="fas fa-pencil-alt"></i>
                        </a>

                        <a title="Eliminar {{(isset($rol->deleted_at) ? 'DEFINITIVAMENTE':'')}}" class="btn-delete btn btn-danger btn-xs" href="{{ route('rols.destroy',$rol->id) }}" id="btn-delete-rolid_{{$rol->id}}">
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
            $('#table-data-rols').DataTable( {
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