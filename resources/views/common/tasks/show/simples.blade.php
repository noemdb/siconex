@isset($tasks)

    <div id="accordion">

        @foreach($tasks as $task)

            <div class="card">
                <div class="card-header" id="heading_task_{{ $task->id or '' }}">
                    <h5 class="mb-0">
                        <button class="btn btn-link btn-sm" data-toggle="collapse" data-target="#accordion_task_{{ $task->id or '' }}" aria-expanded="true" aria-conttasks="accordion_task_{{ $task->id or '' }}">
                            <span class="text text-{{ $task->tipo or '' }}">{{ $task->truncdescripcion }}</span>
                        </button>
                    </h5>
                </div>

                <div id="accordion_task_{{ $task->id or '' }}" class="collapse" aria-labelledby="heading_task_{{ $task->id or '' }}" data-parent="#accordion">
                    <div class="card-body">

                        @include('common.tasks.show.simple')

                    </div>
                </div>
            </div>

        @endforeach

    </div>

@endisset