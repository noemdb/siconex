@isset($alerts)
<h4>Últimas 5 </h4>
@php ($alerts = $alerts->take(5))

    <div id="accordion">

        @foreach($alerts as $alert)

            <div class="card border-{{$alert->class or 'secondary'}} border-top-0 border-right-0 border-bottom-0">
                <div class="card-header" id="heading_task_{{ $alert->id or '' }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#accordion_task_{{ $alert->id or '' }}" aria-expanded="true" aria-conttasks="accordion_task_{{ $alert->id or '' }}">
                            <span class="text text-{{ $alert->tipo or '' }}">{{ $alert->truncmensaje }}</span>
                        </button>
                    </h5>
                </div>

                
                    <div id="accordion_task_{{ $alert->id or '' }}" class="collapse" aria-labelledby="heading_task_{{ $alert->id or '' }}" data-parent="#accordion">
                        <div class="card-body">

                            @include('common.alerts.show.simple')

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