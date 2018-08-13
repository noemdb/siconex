<ul class="list-group">
	@foreach($datas as $data)
	    <li class="list-group-item text-overflow" title="{{ $data->descripcion or 'default' }}">
	        <span class="text-{{$data->documentos->first()->class or 'secondary'}} font-weight-bold">
	        	<i class="{{$icon or ''}}"></i>
	        	<span title="Código">
	        		[{{ $data->codigo or '' }}]
	        	</span>
	            <span class="pull-right text-muted small"> <em>{{ $data->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $data->descripcion or 'default' }} text-overflow">
	        	{{ (isset($show_content)) ? $data->descripcion : '' }}
	        </div>
	    </li>
	@endforeach
</ul>

<a href="#" class="btn btn-link">Mas...</a>
