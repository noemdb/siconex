<a class="dropdown-item" href="#">
    <i class="{{ $icon_menus['config'] }} text-primary"></i>
    Configuraciones
</a>

{{-- <a class="dropdown-item" href="{{ route('admin.home') }}"> --}}
{{-- <a class="dropdown-item" href="#">
    <i class="{{ $icon_menus['sistema'] }} text-info"></i>
    Sistema
</a> --}}

<a class="dropdown-item" href="{{ route('admin.home') }}" title="Administracion del Sistema">
    <i class="{{ $icon_menus['sistema'] }} text-warning"></i>
    Sistema
</a>

{{-- <a class="dropdown-item" href="{{ route('poa.home') }}"> --}}
<a class="dropdown-item" href="{{ route('common.home') }}" title="Control de Taréas, Mensajes y Alertas">
    <i class="{{ $icon_menus['tma'] }} text-info"></i>
    Módulo TMA
</a>



{{-- <a class="dropdown-item" href="{{ route('poa.home') }}"> --}}
<a class="dropdown-item" href="{{ route('expediente.home') }}" title="Control de Expedientes">
    <i class="{{ $icon_menus['brand'] }} text-success"></i>
    Control de Expedientes
</a>

{{--
<a class="dropdown-item" href="#">
    <i class="fas fa-address-card text-info"></i>
    Sistema
</a>

<a class="dropdown-item" href="#">
    <i class="fas fa-address-book text-dark"></i>
    Rol
</a>

<a class="dropdown-item" href="#">
    <i class="fas fa-tasks text-warning"></i>
    Actividades
</a>

<a class="dropdown-item" href="#">
    <i class="fas fa-comment text-secondary"></i>
    Mensajes
</a>
--}}

<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt text-danger"></i>
    {{ __('Salir') }}
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form>

{{-- 
<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
    <i class="fas fa-sign-out-alt text-danger"></i>
    Salir
</a>

<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
    @csrf
</form> 
--}}