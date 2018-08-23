{{-- INI Mensaje flash sobreo operaciones con base de datos --}}
@if (Session::has('operp_ok'))
    {{-- <div class="alert alert-success alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        {{ Session::get('operp_ok')}}
    </div> --}}

	@section('scripts')
	    @parent
	    <script type="text/javascript">
	        swal({
	          type: 'success',
	          title: 'Excelente!',
	          html: '<i class="{{ $icon_menus['guardado'] }} text-success"></i> {{ Session::get('operp_ok')}}',
	        })
	    </script>
	@endsection

@endif
{{-- FIN Mensaje flash sobreo operaciones con base de datos --}}