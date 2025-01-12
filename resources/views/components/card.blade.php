@props([
    'title' => null,
    'actions' => null,
])

<div class="card bg-base-100 w-2/3 shadow-xl">
    <div class="card-body">
        @if ($title)
            <div class="card-title">{{$title}}</div>
        @endif

        {{$slot}}

        @if ($title)
            <div class="card-actions flex items-center justify-between">
                {{$actions}}
            </div>
        @endif
    </div>
</div>
