<ul class="list-group">
	@foreach($profiles as $profile)
	    <li class="list-group-item text-overflow" title="{{ $profile->fullname or 'default' }}">
	        <span class="text-{{ $profile->user->class or 'default' }}">
	            <b>
	            	<i class="{{$icon_menus['profile'] or ''}}"></i>
	            	{{ $profile->fullname or '' }} 	            	
	            </b>
	            <span class="pull-right text-muted small"> <em>{{ $profile->created_at->diffForHumans() }}</em></span>
	        </span>
	        <div class="text-{{ $profile->user->class or 'default' }} text-overflow">
	        	{{$profile->user->username or ''}}
	        	{{-- {{ (isset($show_task)) ? $profile->email : '' }} --}}
	        </div>
	    </li>
	@endforeach
</ul>

<a href="{{ route('profiles.index') }}" class="btn btn-link">Mas...</a>
