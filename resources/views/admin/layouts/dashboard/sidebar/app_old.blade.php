<div class="sidebar-sticky" style="">
    <ul class="nav flex-column" id="side-menu">
        
        {{-- 
        <li>
            @include('admin.layouts.dashboard.sidebar.elements.profile')
        </li> 
        --}}

        {{-- @if(Auth::user()->getSetting('sidebar_search')=='true') --}}
            <li class="nav-item">
                @include('admin.layouts.dashboard.sidebar.elements.sidebar-search')
            </li>
        {{-- @endif --}}

        {{-- @if(Auth::user()->getSetting('sidebar_dashboard')=='true') --}}
            <li class="nav-item" {{ (Request::is('*dashboard*') ? 'class=active' : '') }}>
                <a href="{{ url ('admin/dashboard') }}"><i class="fas fa-tachometer-alt"></i> Dashboard</a>
            </li>
        {{-- @endif --}}

        {{-- @if(Auth::user()->getSetting('sidebar_modelos')=='true') --}}
            <li class="nav-item" {{ (Request::is('*models*') ? ' aria-expanded=true class=active ' : '') }}>
                @include('admin.layouts.dashboard.sidebar.elements.models')
            </li>
        {{-- @endif --}}

        {{-- @if(Auth::user()->getSetting('sidebar_chart')=='true') --}}
            <li class="nav-item" {{ (Request::is('*charts*') ? 'class=active' : '') }}>
                {{-- @include('admin.layouts.dashboard.sidebar.elements.charts') --}}
            </li>
        {{-- @endif --}}

        {{-- @if(Auth::user()->getSetting('sidebar_tables')=='true') --}}
            <li class="nav-item" {{ (Request::is('*tables*') ? 'class=active' : '') }}>
                {{-- @include('admin.layouts.dashboard.sidebar.elements.tables') --}}
            </li>
        {{-- @endif --}}

        {{-- @if(Auth::user()->getSetting('sidebar_forms')=='true') --}}
            <li class="nav-item" {{ (Request::is('*forms*') ? 'class=active' : '') }}>
                {{-- <a href="{{ url ('admin/forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a> --}}
            </li>
        {{-- @endif --}}
        
    </ul>
</div>
{{-- /.sidebar-collapse --}}