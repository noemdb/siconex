<ul class="list-group">
	@foreach($users as $user)
	    <li class="list-group-item text-overflow" title="{{ $user->username or 'default' }}">
	        <span class="text-{{ $user->class or 'default' }}">
	            <b><i class="{{$icon_menus['user'] or ''}}"></i> {{ $user->username or 'default' }}</b>
	            <span class="pull-right text-muted small"> <em>{{ $user->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $user->class or 'default' }} text-overflow">
	        	{{$user->email or ''}}
	        	{{-- {{ (isset($show_task)) ? $user->email : '' }} --}}
	        </div>
	    </li>
	@endforeach
</ul>

<a href="{{ route('users.index') }}" class="btn btn-link">Mas...</a>
