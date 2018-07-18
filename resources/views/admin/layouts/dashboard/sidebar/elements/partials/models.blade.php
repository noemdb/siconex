{{-- @if(Auth::user()->getSetting('sidebar_models_'.$models)=='true') --}}
    <li class="nav-item">
        <a href="#" class="nav-link">
            <i class="fa fa-{{$icon or 'asterisk'}} text-{{$class or 'default'}}" aria-hidden="true"> </i>
            {{$titulo or 'default'}} <i class="fas fa-caret-right"></i>
        </a>
        <ul class="nav nav-third-level">
            {{-- @if(Auth::user()->getSetting('sidebar_models_'.$models.'_crud')=='true') --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ url ('admin/models/crud/'.$models) }}">
                        <i class="fas fa-list text-purple" aria-hidden="true"> </i>
                        CRUD
                    </a>
                </li>
            {{-- @endif --}}
            {{-- @if(Auth::user()->getSetting('sidebar_models_'.$models.'_chart')=='true') --}}
            <li class="nav-item">
                <a class="nav-link" href="{{ url ('admin/models/charts/'.$models) }}">
                    <i class="fas fa-chart-pie text-teal"></i>
                    Gráficas
                </a>
            </li>
            {{-- @endif --}}
        </ul>
        <!-- /.nav-third-level -->
    </li>
{{-- @endif --}}