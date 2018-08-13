<ul class="list-group">
	@foreach($tasks as $task)
	    <li class="list-group-item text-overflow" title="{{ $task->descripcion or 'default' }}">
	        <span class="text-{{ $task->tipo or 'default' }}">
	            <b><i class="fa fa-tasks fa-fw"></i> {{ $task->codigo or 'default' }}</b>
	            <span class="pull-right text-muted small"> <em>{{ $task->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $task->tipo or 'default' }} text-overflow">
	        	{{ (isset($show_task)) ? $task->descripcion : '' }}
	        </div>
	    </li>
	@endforeach
</ul>

<a href="#" class="btn btn-link">Mas...</a>
