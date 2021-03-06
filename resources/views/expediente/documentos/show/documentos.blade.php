@isset($documentos)

    <div id="accordion">

        @foreach($documentos as $documento)

            <div class="card">
                <div class="card-header" id="heading_task_{{ $documento->id or '' }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-sm nounderline" style="text-decoration: none" data-toggle="collapse" data-target="#accordion_task_{{ $documento->id or '' }}" aria-expanded="true" aria-conttasks="accordion_task_{{ $documento->id or '' }}">
                            @if(isset($documento->created_at))
                                [{{ (isset($documento->created_at)) ? Carbon\Carbon::parse($documento->created_at)->format('Ym') : '' }}]
                            @endif
                            [{{ $documento->tipo or '' }}]
                            {{ $documento->truncdescripcion or '' }}
                        </button>
                    </h5>
                </div>

                <div id="accordion_task_{{ $documento->id or '' }}" class="collapse" aria-labelledby="heading_task_{{ $documento->id or '' }}" data-parent="#accordion">
                    <div class="card-body">
                        {{-- Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS. --}}

                        @include('expediente.documentos.show.documento')

                        <a class="btn btn-warning w-100 p-0 m-0" href="{{ route('documentos.edit',$documento->id)}}" taske="button">
                            Actualizar
                            <i class="{{$icon_menus['documento'] or ''}}"></i>
                        </a>

                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endisset