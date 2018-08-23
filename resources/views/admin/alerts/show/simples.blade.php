@isset($alerts)

    <div id="accordion">

        @foreach($alerts as $alert)

            <div class="card">
                <div class="card-header" id="heading_task_{{ $alert->id or '' }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#accordion_task_{{ $alert->id or '' }}" aria-expanded="true" aria-conttasks="accordion_task_{{ $alert->id or '' }}">
                            <span class="text text-{{ $alert->tipo or '' }}">{{ $alert->truncmensaje }}</span>
                        </button>
                    </h5>
                </div>

                
                    <div id="accordion_task_{{ $alert->id or '' }}" class="collapse" aria-labelledby="heading_task_{{ $alert->id or '' }}" data-parent="#accordion">
                        <div class="card-body">
                            123

                            @include('admin.alerts.show.simple')

                            {{-- @if(Auth::user()->isAdmin())
                                <a class="btn btn-warning w-100" href="{{ route('alerts.edit',$alert->id)}}" taske="button">
                                    Actualizar
                                    <i class="{{$icon_menus['alert'] or ''}}"></i>
                                </a>
                            @endif --}}

                        </div>
                    </div>
                
            </div>

        @endforeach

    </div>

@endisset