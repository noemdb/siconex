<ul class="list-group">
	@foreach($messeges as $messege)
	    <li class="list-group-item text-overflow" title="{{ $messege->mensaje or 'default' }}">
	        <span class="text-{{ $messege->class or 'default' }}">
	            <i class="fa {{$icon_menus['messege'] or ''}} fa-fw"></i> {{ $messege->user->username or 'default' }}
	            <span class="pull-right text-muted small"> <em>{{ $messege->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $messege->TipClass or 'default' }} text-overflow">
	        	{{ (isset($show_messege)) ? $messege->mensaje : '' }}
	        </div>
		</li>
	@endforeach
</ul>
<a href="{{ route('messeges.index') }}">Mas...</a>